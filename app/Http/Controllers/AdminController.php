<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $reports = Report::all(); //Получаем все заявки
        return view('admin-panel', compact('reports')); //Возвращаем вид с данными
    }
}
