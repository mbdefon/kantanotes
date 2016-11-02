<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //------Views------
    public function create_view(Request $request){
        return view('category.create');
    }

    //------Functions----
    public function create(Request $request){
        $this->validate($request, [
            'name'         => 'required|max:255',
            'description'       => 'required',
        ]);
        $category = new Category($request->all());
        $category->user_id = $request->user()->id;
        $category->save();

        return redirect('/')->with('status', 'Category created!');;
    }
}
