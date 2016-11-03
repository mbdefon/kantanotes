<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/11/2016
 * Time: 00:46
 */?>

@extends('layouts.logged')

@section('app-content')

    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 ">
                <a href="{{url('note/create')}}">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Create a new note
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

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
                <ul class="list-group ">
                    @if(isset($notes))
                        @foreach ($notes as $note)
                            <a href="{{ url('note/'.$note->id) }}" class="list-group-item">{{$note->title}}</a>
                        @endforeach
                        @if(count($notes)==0)
                            <li class="list-group-item">No notes in this category!</li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </div>


@endsection

