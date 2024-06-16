<?php

namespace App\Http\Controllers;

use App\Models\tb_catalogues;
use App\Models\tb_order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

       $catalogue = tb_catalogues::get();
       $order = tb_order::get();
       $requested = tb_order::where('status', 'requested');
       $approved = tb_order::where('status', 'approved');

       return view('admin.dashboard', compact(
        'catalogue',
        'order',
        'requested',
        'approved',
       ));
    }
}
