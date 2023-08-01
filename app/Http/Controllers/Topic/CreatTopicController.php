<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\Topic;
use App\Models\TopicCategory;
use App\Models\TopicImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CreatTopicController extends Controller{

    public function __invoke(Request $request){
        $categories = TopicCategory::all();
        $tools = Tool::all();
        return view('topic.create', compact('categories', 'tools'));
    }


    public function submit(Request $request){
        Validator::make($request->all(), [
            'title' => ['required'],
            'tool' => ['required'],
            'text' => ['required'],
            'category' => [
                'required',
                function($attribute, $value, $fail){

                    if($value == '0')
                        return $fail('لطفا یک مورد را از لیست انتخاب کنید');

                },
            ],
            'files' => ['array'],
            'files.*' => ['file', 'max:5120'],
        ], [
            'title.required' => "لطفا عنوان خود را وارد کنید",
            'category.required' => "لطفا دسته بندی را وارد کنید ",
            'tool.required' => "لطفا ابزار را وارد کنید",
            'text.required' => "لطفا متن را  وارد کنید",
            'files.max' => "حجم فایل نباید بیشتر از 5 مگ باشد ",
        ])->validate();


        $topic = Topic::query()->create([
            'client_id' => auth()->guard('clients')->user()->id,
            'topic_category_id' => $request->category,
            'tool_id' => $request->tool,
            'title' => $request->title,
            'content' => $request->text,
        ]);

        if ($request->has('files')) {
            foreach ($request->files as $f)
                foreach ($f as $file) {
                    $name = time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
                    $fileName = 'files/' . $name;
                    Storage::put($fileName, file_get_contents($file));

                   $t_image = TopicImage::query()->create([
                        'name' => $name,
                        'file' => $fileName,
                        'topic_id' => $topic->id,
                    ]);
                   if ($file->getClientOriginalExtension()=='png' || $file->getClientOriginalExtension()=='jpg' || $file->getClientOriginalExtension()=='jpeg')
                       $t_image->is_file = true;
                   $t_image->save();
                }
        }
        return redirect()->route('profile');

    }
}
