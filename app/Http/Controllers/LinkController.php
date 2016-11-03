<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Note;

class LinkController extends Controller
{

    //------Functions----

    public function create(Request $request){
        $this->validate($request, [
            'url'         => 'required|max:255',
            'note_id'   => 'required|integer',
        ]);
        $link = new Link($request->all());
        $link->note_id = $request->note_id;
        $link->save();

        return redirect('/note/'.$link->note_id)->with('status', 'Link created!');
    }

    public function delete(Request $request){
        $this->validate($request, [
            'link_id'   => 'required|integer',
        ]);
        $link = Link::where('id',$request->link_id)->first();
        $link->delete();
        return redirect('/note/'.$link->note_id)->with('status', 'Link deleted!');
    }
}
