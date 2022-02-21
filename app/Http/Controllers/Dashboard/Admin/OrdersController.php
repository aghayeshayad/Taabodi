<?php
namespace App\Http\Controllers\Dashboard\Admin;
use App\Address;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\User;
use Carbon\Carbon;

class OrdersController extends Controller
{
    public function show($id)
    {
        $orders=Invoice::find($id)->with('Order','information','product','User','Address')->get();
        $users=Address::all();
        return view('Dashboard.Admin.Orders.show',compact('orders','users'));
    }
}
