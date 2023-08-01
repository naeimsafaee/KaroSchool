<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class VerifyController extends Controller {

    public function verify_email($verify_link) {
        $client = Client::query()->where('verify_link', $verify_link)->firstOrFail();
        $client->status = true;
        $client->verify_link = null;
        $client->save();

        return view('auth.verify_email');
    }
}
