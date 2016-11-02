@extends('layouts.logged')

@section('app-content')
<div class="col-md-9 col-sm-9 col-xs-12">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Hello {{\Auth::user()->first_name}}!
                    <br>
                    You can create a note, create a category, or display your notes.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
