<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Table;

class PageController extends Controller
{
    public function home(){
        $categories = Category::orderBy('created_at', 'desc')->limit(4)->get();
        $tables = Table::get();
        return view('pages.home', [
            'categories' => $categories,
            'tables' => $tables
        ]);
    }

    public function contact(){
        return view('pages.contact');
    }

    public function service(){
        return view('pages.service');
    }

    public function about(){
        return view('pages.about');
    }

}
