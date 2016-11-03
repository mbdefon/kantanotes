<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 02/11/2016
 * Time: 23:45
 */?>

@extends('layouts.logged')

@section('app-content')
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a category</div>

                    <div class="panel-body">
                        <form method="post" action="{{url('category/create')}} " files="true" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            @include('common.error')

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name of the category" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" placeholder="Description" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Create Category <i class="fa fa-plus" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

