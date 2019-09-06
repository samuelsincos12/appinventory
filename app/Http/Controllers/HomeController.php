<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class HomeController extends Controller
{
    public function index()
    {
        $q1 = Transaksi::msk();
        $q2 = Transaksi::lur();
        $q3 = $q1 - $q2;

        $row = array('saldo' => $q3, 
                     'in'    => $q1, 
                     'out'   => $q2);
        return view('homepage')->with('data', $row);
    }
}
