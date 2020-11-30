<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:newsletters'
        ]);

        return Newsletter::query()->create([
            'email' => $request->input('email')
        ]);
    }

    public function unsubscribe($email)
    {
        Newsletter::query()->where('email', '=', $email)->delete();
        session()->flash('message', 'Thank you! you can subscribe again anytime');
        return redirect()->route('home');
    }
}
