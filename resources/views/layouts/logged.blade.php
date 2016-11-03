<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 02/11/2016
 * Time: 23:22
 */?>


@extends('layouts.app')

@section('content')

    <div class="col-md-3 col-sm-3 col-xs-12">
        <a href="{{url('category/create')}}">
            <div class="panel panel-default">
                <div class="panel-body">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Create a new category
                </div>
            </div>
        </a>

        <div class="list-group">
            <p class="list-group-item active">
                My Categories
            </p>
            <a href="{{url('0/notes')}}" class="list-group-item">Default</a>
            @if(isset($categories))
                @foreach ($categories as $category)
                    <a href="{{url($category->id.'/notes')}}" class="list-group-item">{{$category->name}}</a>
                @endforeach
            @endif
        </div>

        <a href="{{url('category/delete')}}">
            <div class="panel panel-default">
                <div class="panel-body">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    Delete a category
                </div>
            </div>
        </a>
    </div>

    @yield('app-content')

@endsection

