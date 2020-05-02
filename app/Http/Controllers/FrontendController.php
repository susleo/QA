<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //

    public function category(){
        return  view('frontend.category.index')
            ->with('categories',Category::latest()->paginate(12));
    }


}
