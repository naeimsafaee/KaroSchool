<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'content', 'topic_id' , 'answer_id' ];

    public function scopeActive($query)
    {

        return $query->where('active', true);
    }

    public function getTimeAttribute()
    {

        return fa_number($this->created_at->diffForHumans());
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function getClientLikeAttribute  ()
    {
        $like = LikeToAnswer::query()->where('client_id', auth()->guard('clients')->user()->id)
            ->where('answer_id', $this->id)->get();

        if ($like->count() == 0)
            return false;
        else
            return true;
    }

    public function reply()
    {
        return $this->hasMany(Answer::class, 'answer_id', 'id');
    }

    public function getLikeImageAttribute() {

        $likes = LikeToAnswer::query()->where('answer_id', $this->id)->get();

        $client = [];
        foreach ($likes as $like)
            $client[] = Client::query()->findOrFail($like->client_id);

        return $client;
    }

}
