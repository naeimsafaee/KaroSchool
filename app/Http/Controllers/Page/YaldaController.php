<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientToDiscount;
use App\Models\DiscountCode;
use App\Notifications\SendSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class YaldaController extends Controller {

    public function __invoke(Request $request) {
        return view('pages.yalda');
    }

    public function yalde_code(Request $request) {

        $client = Client::query()->where('phone', $request->phone)->first();
        if (!$client)
            return response()->json('client not found', 404);
        else {
            $code = rand(1000, 9999);
            $client->password_code = $code;
            $client->notify(new SendSMS($client->phone, $code));
            $client->save();
            return response()->json('ok', 200);
        }

    }

    public function yalde_submit(Request $request) {
        $client = Client::query()->where('phone', $request->phone)->first();

        Validator::make($request->all(), [
            'verufy_code' => [
                'required',
                function($attribute, $value, $fail) use ($client) {
                    if (!$client)
                        return response()->json('client not found', 404);

                    if ($value != $client->password_code)
                        return response()->json('not correct', 400);

                },
            ],
        ], [
            'code.required' => "لطفا کد تایید  خود را وارد کنید ",

        ])->validate();

        $client->password_code = null;
        $client->save();
        Auth::guard('clients')->loginUsingId($client->id, true);
        return response()->json($client, 200);

    }

    public function yalda_watermelon(Request $request) {
        $collection = collect(['yalda10', 'yalda15', null, null, null]);

        $collection = $collection->shuffle();

        if ($collection[$request->index] == 'yalda10') {
            $code = DiscountCode::query()->where('code', 'yalda10')->first();
            ClientToDiscount::query()->create([
                'client_id' => auth()->guard('clients')->user()->id,
                'discount_code_id' => $code->id
            ]);

            return response('ﮐﺪ yalda10 ﻣﻮﻗﻊ ﺧﺮﯾﺪ از دوره ﻫﺎی ﻣﺪرﺳﻪ وارد ﮐﻦ و ده درصد ﺗﺨﻔﯿﻒ ﺑﮕﯿﺮ', 200);
        }

        if ($collection[$request->index] == 'yalda15') {
            $code = DiscountCode::query()->where('code', 'yalda15')->first();
            ClientToDiscount::query()->create([
                'client_id' => auth()->guard('clients')->user()->id,
                'discount_code_id' => $code->id
            ]);

            return response('ﮐﺪ yalda15 ﻣﻮﻗﻊ ﺧﺮﯾﺪ از دوره ﻫﺎی ﻣﺪرﺳﻪ وارد ﮐﻦ و ده درصد ﺗﺨﻔﯿﻒ ﺑﮕﯿﺮ', 200);
        }

        return response(null);
    }

    public function poem(Request $request) {
        //poem 1
        $poem = 'صحبت حکام ظلمت‌شـب یلداست نور ز خورشید جوی بو که برآید';
        $poem = explode(" ", $poem);
        $poem1 = [];
        for($i = 0; $i < count($poem); $i++) {
            $poem1[] = [
                "text" => $poem[$i],
                "index" => $i
            ];
        }

        //poem2
        $poem = 'برآی ای‌صبح مشتاقان اگر نزدیک‌روز آمد‌که بگرفت این شب‌یلدا ملال‌از ماه‌و‌پروینم';
        $poem = explode(" ", $poem);
        $poem2 = [];
        for($i = 0; $i < count($poem); $i++) {
            $poem2[] = [
                "text" => $poem[$i],
                "index" => $i
            ];
        }

        //poem 3
        $poem = 'هنوز با همه دردم امید درمانست که‌آخری بود آخر شبان یلدا‌را';
        $poem = explode(" ", $poem);
        $poem3 = [];
        for($i = 0; $i < count($poem); $i++) {
            $poem3[] = [
                "text" => $poem[$i],
                "index" => $i
            ];
        }

        //poem 4
        $poem = 'نظر به روی‌تو هر‌بامداد نوروزی‌ست شب فراق‌تو هر‌شب که هست یلدایی‌ست';
        $poem = explode(" ", $poem);
        $poem4 = [];
        for($i = 0; $i < count($poem); $i++) {
            $poem4[] = [
                "text" => $poem[$i],
                "index" => $i
            ];
        }

        $poem = collect([$poem1, $poem2, $poem3, $poem4]);
//        $poem = $poem->shuffle();

        return response(collect($poem[$request->index])->shuffle(), 200);
    }


    public function submit_poem(Request $request) {

        $code = DiscountCode::query()->where('code', 'yalda20')->first();
        ClientToDiscount::query()->create([
            'client_id' => auth()->guard('clients')->user()->id,
            'discount_code_id' => $code->id
        ]);

        return response("ایول با این کد yalda20" . " "  . \auth()->guard('clients')->user()->name . " 20 درصد تخفیف دیگه داری ");
    }

}
