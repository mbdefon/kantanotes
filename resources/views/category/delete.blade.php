<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/11/2016
 * Time: 00:03
 */?>

@extends('layouts.logged')

@section('app-content')
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Delete a category</div>

                    <div class="panel-body">
                        <form method="post" action="{{url('category/delete')}} " files="true" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <select class="form-control" name="id">
                                    @foreach ($del_categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-danger">Delete Category <i class="fa fa-Trash" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

