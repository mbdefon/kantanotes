<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/11/2016
 * Time: 10:36
 */?>

<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/11/2016
 * Time: 01:04
 */?>

@extends('layouts.logged')

@section('app-content')

    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 ">
                <div class="panel panel-default ">
                    <div class="panel-heading clearfix">
                        Edit note: {{$note->title}}
                    </div>

                    <div class="panel-body">
                        <form method="post" action="{{url('note/save')}} " files="true" enctype="multipart/form-data">
                                <input type="hidden" name="note_id" value="{{$note->id}}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" value="{{$note->title}}" placeholder="Title of the note" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" placeholder="Description" name="description">{{$note->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="0" @if($note->category_id==0) selected @endif>Default</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if($note->category_id==$category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Save note <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </button>
                        </form>


                    </div>

                    <div class="panel-footer" style="background-color: white">
                        <form method="post" action="{{url('link/delete')}} " files="true" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="category_id">Delete link</label>
                                <select class="form-control" name="link_id">
                                    @foreach ($links as $link)
                                        <option value="{{$link->id}}">{{$link->url}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-danger">Delete link <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection



