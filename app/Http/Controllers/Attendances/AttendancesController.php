<?php

namespace App\Http\Controllers\Attendances;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
    public function index()
    {
        return view('attendances.index');
    }
}
