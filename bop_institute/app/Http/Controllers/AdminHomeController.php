<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function courseManagement()
    {
        return view('admin.course_management.index');
    }
}
