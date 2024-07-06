<?php

namespace App\Http\Controllers\presentation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePresentationController extends Controller
{
    public function index()
    {
        return view('presentation.home.index');
    }
    public function cursos()
    {
        return view('presentation.curso.index');
    }
}
