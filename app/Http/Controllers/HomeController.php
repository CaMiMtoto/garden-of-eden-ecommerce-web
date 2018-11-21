<?php

namespace App\Http\Controllers;

use App\Category;
use App\MyFunc;
use App\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home', ['categories' => Category::all()]);
    }

    public function dashboard()
    {
        return view('admins.dashboard');
    }


    public function settings()
    {
        $setting = MyFunc::getDefaultSetting();
        if(!$setting) abort(404);
        return view('admins.settings', ['setting' => $setting]);
    }


    public function saveSettings(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'email1' => 'required|email',
            'phoneNumber1' => 'required|min:10|max:13',
            'address' => 'required',
            'about' => 'required'
        ]);

        $setting = MyFunc::getDefaultSetting();
        if (!$setting) {
            $setting = new Setting();
        }
        $setting->company_name = $request->input('company_name');
        $setting->phoneNumber1 = $request->input('phoneNumber1');
        $setting->phoneNumber2 = $request->input('phoneNumber2');
        $setting->email1 = $request->input('email1');
        $setting->email2 = $request->input('email2');
        $setting->whatsapp = $request->input('whatsapp');
        $setting->address = $request->input('address');
        $setting->about = $request->input('about');
//        $setting->logo=$request->input('');
        $setting->save();

        return response()->json(['setting' => $setting], 200);
    }
}
