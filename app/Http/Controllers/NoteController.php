<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Category;
use App\Link;

class NoteController extends Controller
{
    //------Views------
    public function create_view(Request $request){
        $categories = Category::where('user_id',$request->user()->id)->get();
        return view('note.create',['categories' => $categories]);
    }

    public function index(Request $request, $id){
        $notes = Note::where('category_id',$id)->get();
        if ($id !=0 ) {
            $category = Category::where('id', $id)->first();
        } else {
            $category = "";
        }
        return view('note.index',['notes' => $notes,'category' => $category]);
    }

    public function display(Request $request, $id){
        $note = Note::where('id',$id)->first();
        if ($note->category_id !=0 ) {
            $category = Category::where('id', $note->category_id)->first();
        } else {
            $category = "";
        }
        $links = Link::where('note_id',$note->id)->get();
        return view('note.display',['note' => $note,'category' => $category,'links' => $links]);
    }

    public function edit_view(Request $request,$id){
        $note = Note::where('id',$id)->first();
        $categories = Category::where('user_id',$request->user()->id)->get();
        $links = Link::where('note_id',$note->id)->get();
        return view('note.edit',['note' => $note,'categories' => $categories,'links' => $links]);
    }

    //------Functions----

    public function create(Request $request){
        $this->validate($request, [
            'note_id'         => 'required|integer',
            'url'             => 'required|max:255',
        ]);
        $note = new Note($request->all());
        $note->user_id = $request->user()->id;
        $note->save();

        return redirect('/'.$note->category_id.'/notes')->with('status', 'Note created!');
    }

    public function save(Request $request){
        $this->validate($request, [
            'note_id'         => 'required|integer',
            'title'             => 'required|max:255',
            'description'       =>'required',
            'category_id'       => 'required'
        ]);
        $note = Note::where('id',$request->note_id)->first();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->category_id = $request->category_id;
        $note->save();
        return redirect('/note/'.$note->id)->with('status', 'Note updated!');
    }

    public function delete(Request $request){
        
    }




}
