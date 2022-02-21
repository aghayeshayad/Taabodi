<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Order;
use App\OrderInfo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Check user authentication
     *
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('role');
    }

    /**
     * Return admin panel master page
     *
     * @return View
     */
    public function index()
    {
        $orders=Invoice::with('Order','information','product','User')->get();
//        dd($orders);
        $orders_month=Invoice::where('created_at', '>=', Carbon::now()->firstOfMonth()->toDateTimeString())->get();
        $users=User::all();
        return view('Dashboard.Admin.index',compact('orders','users','orders_month'));
    }
}
