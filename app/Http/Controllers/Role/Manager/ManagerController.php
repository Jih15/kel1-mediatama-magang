<?php

namespace App\Http\Controllers\Role\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        return view('role.manager.index');
    }
}
