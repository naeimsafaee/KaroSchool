<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model {
    use HasFactory;

    protected $fillable = ['client_id', 'topic_category_id', 'tool_id', 'title', 'content'];
    protected $appends = ['answers_count'];

    public function getTimeAttribute() {

        return fa_number($this->created_at->diffForHumans());
    }

    public function scopeActive($query) {
        return $query->where('active', true);
    }

    public function category() {
        return $this->hasOne(TopicCategory::class, 'id', 'topic_category_id');
    }

    public function client() {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function tool() {
        return $this->hasOne(Tool::class, 'id', 'tool_id');
    }

    public function getClientLikeAttribute() {

        $like = LikeToTopic::query()->where('client_id', auth()->guard('clients')->user()->id)
            ->where('topic_id', $this->id)->get();

        return $like->count() != 0;
    }

    public function getLikeImageAttribute() {

        $likes = LikeToTopic::query()->where('topic_id', $this->id)->get();

        $client = [];
        foreach ($likes as $like)
            $client[] = Client::query()->findOrFail($like->client_id);

        return $client;
    }

    public function answers() {
        return $this->hasMany(Answer::class, 'topic_id', 'id')->where('answer_id', null)->active();
    }

    public function getAnswersCountAttribute(){
        return $this->hasMany(Answer::class, 'topic_id', 'id')->active()->count();
    }

    public function files() {
        return $this->hasMany(TopicImage::class, 'topic_id', 'id');
    }

}
