<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    /**
     *
     * Show the Super Admin dashboard.
     */

    public function index() {
        return view('superadmin.home');
    }
}
