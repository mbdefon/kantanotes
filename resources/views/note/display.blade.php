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
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title pull-left" style="padding-top: 7.5px;">{{$note->title}}</h4>
                            <div class=" pull-right">
                                <a href="{{url('note/'.$note->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>

                        <div class="panel-body">
                            {{$note->description}}

                        </div>

                        <div class="panel-body">
                            <form method="post" action="{{url('link/create')}} " files="true" enctype="multipart/form-data">
                                {!! csrf_field() !!}

                                @include('common.error')

                                <div class="input-group">
                                    <input type="hidden" value="{{$note->id}}" name="note_id">
                                    {!! csrf_field() !!}
                                    <input type="text" class="form-control" id="url" placeholder="URL of the link" name="url">
                                      <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Add Link <i class="fa fa-plus" aria-hidden="true"></i></button>
                                      </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>

                        <div class="panel-body">
                            @if(!isset($links) || count($links)==0)
                                No links added yet!
                            @else
                                <ul>
                                @foreach ($links as $link)
                                    <li><a target="_blank" href="{{$link->url}}">{{$link->url}}</a></li>
                                @endforeach
                                </ul>
                            @endif
                        </div>

                </div>
            </div>
        </div>
    </div>


@endsection


