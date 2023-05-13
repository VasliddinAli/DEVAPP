<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getData(Request $request){
        // return $request;
    $data = [
        "success" => true,
        "message" => "",
        "data" => [
            "checkurl" => "http://192.168.40.47/LOGISTIC/hs/item/",
            "checkurl_login" => "ClosingBalance",
            "checkurl_pass" => "2536369",
            "order_url" => "http://195.158.9.186:8181/KASSAMICRO/hs/cashier/",
            "order_url_login" => "Admin",
            "order_url_pass" => "123456"
        ],
        "error_code" => ""
    ];
    return json_encode($data);
    }
}
