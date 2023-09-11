<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = array(
            'title' => 'Dashboard - Badan Pusat Statistik'
        );
        return view('Dashboard',$data);
    }
}
