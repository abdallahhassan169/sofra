<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\Client;
use App\models\Order;
use App\models\Restaurant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        $clients=Client::all();
        $restaurants=Restaurant::all();
        $orders=Order::all();
        return view('admin/home',compact('orders','restaurants','clients'));
    }
}
