<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    // return app()->getLocale();
    // return config('app.locale');
    return view('Admin.index');
  }
}
