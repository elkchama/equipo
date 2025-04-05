<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    return view('admin.dashboard'); // Asegúrate de tener esta vista en resources/views
}

}
