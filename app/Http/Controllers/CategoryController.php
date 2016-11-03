<?php

namespace App\Http\Controllers;

use App\Category;
use App\Note;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //------Views------
    public function create_view(Request $request){
        return view('category.create');
    }

    public function delete_view(Request $request){
        $del_categories = Category::where('user_id',$request->user()->id)->get();
        return view('category.delete',['del_categories' => $del_categories]);
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

        return redirect('/')->with('status', 'Category created!');
    }

    public function delete(Request $request){
        $this->validate($request, [
            'id'         => 'required',
        ]);
        $category = Category::where('id',$request->id)->first();
        $notes = Note::where('category_id',$category->id)->get();
        foreach ($notes as $note){
            $note->category_id = 0;
            $note->save();
        }
        $category->delete();
        return redirect('/')->with('status', 'Category deleted!');
    }
}
