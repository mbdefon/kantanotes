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
                <div class="panel panel-default panel-primary">
                    @if($category!="")
                        <div class="panel-heading ">{{$category->name}}</div>

                        <div class="panel-body">
                            {{$category->description}}
                        </div>
                    @else
                        <div class="panel-heading">Default</div>

                        <div class="panel-body">
                            This is your default category.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 ">
                <div class="panel panel-default ">
                        <div class="panel-heading ">{{$note->title}}</div>

                        <div class="panel-body">
                            {{$note->description}}

                        </div>

                        <div class="panel-body">
                            <form method="post" action="{{url('link/create')}} " files="true" enctype="multipart/form-data">
                                {!! csrf_field() !!}

                                @include('common.error')

                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" id="url" placeholder="URL of the link" name="url">
                                </div>
                                <button type="submit" class="btn btn-sm btn-success">Add link <i class="fa fa-plus" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <div class="panel-body">
                            @if(!isset($Links))
                                No links added yet!
                            @endif
                        </div>

                </div>
            </div>
        </div>
    </div>


@endsection


