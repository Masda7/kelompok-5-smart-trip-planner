<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        return view('destinations.index');
    }

    public function show($id)
    {
        return view('destinations.show');
    }
}