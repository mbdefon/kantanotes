<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/11/2016
 * Time: 00:37
 */?>


@extends('layouts.logged')

@section('app-content')
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a note</div>

                    <div class="panel-body">
                        <form method="post" action="{{url('note/create')}} " files="true" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            @include('common.error')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Title of the note" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" placeholder="Description" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">Default</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Create note <i class="fa fa-plus" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

