<?php

namespace App\Http\Controllers;

use App\Category;
use App\HomeSlide;
use App\MyFunc;
use App\Order;
use App\Setting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $slides = HomeSlide::query()->where('is_active', '=', true)->get();
        $categories = Category::query()->whereHas('products')->get();
        return view('home', compact('categories', 'slides'));
    }

    public function dashboard()
    {

        $revenues = \DB::table("orders")
            ->select(\DB::raw("YEAR(orders.created_at) as year"), \DB::raw("sum(order_items.sub_total) + orders.shipping_amount as amount"))
            ->join('order_items', "order_items.order_id", "=", "orders.id")
            ->join('products', "products.id", "=", "order_items.product_id")
            ->where('orders.status', '=', Order::DELIVERED)
            ->orderByDesc('year')
            ->groupBy("year")->limit(5)->get()->sortBy('year')->values();
//        return $revenues->sortBy('year')->values();

        return view('admins.dashboard', compact('revenues'));
    }


    public function settings()
    {
        $setting = MyFunc::getDefaultSetting();
        if (!$setting) abort(404);
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
        if (!$setting)
        {
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
