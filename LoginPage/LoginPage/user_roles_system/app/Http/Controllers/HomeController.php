<?php


namespace App\Http\Controllers;
use app\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function firstPage()
    {
       
        return view('welcome');
    }
}
