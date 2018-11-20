@extends('layouts.main') 
@section('title','ADD NEW TASK') 
@section('content') 




<div class="row">

    {!! Form::open(['method' => 'POST','action'=>'ToDoController@store', 'files' => true]) !!}
    
    <div class='form-group'>
    {!! Form::label('title', 'Title :') !!}
    {!! Form::text('title', null, ['class'=>'form-control'])!!}
    </div>
    <div class='form-group'>
    {!! Form::label('content', 'Body :') !!}
    {!! Form::textarea('content', null, ['class'=>'form-control','rows'=>'2'])!!}
    </div>
    <div class='form-group'>
    {!! Form::label('status', 'Status :') !!}
    {!! Form::select('status',array('0'=>'inactive','1'=>'active'), null,['placeholder' => 'choose status'], ['class'=>'form-control'])!!}
    </div>
    <div class='form-group'>
    {!! Form::label('photo_id', 'Photo :') !!}
    {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
    </div>
    <div class='form-group'>
    {!! Form::label('start_date', 'Start at:') !!}
    {!! Form::date('start_date', null, ['class'=>'form-control'])!!}
    </div>
    <div class='form-group'>
    {!! Form::label('end_date', 'End at :') !!}
    {!! Form::date('end_date', null, ['class'=>'form-control'])!!}
    </div>
    <div class='form-group'>
    {!! Form::submit('Create Task', ['class'=>'btn btn-primary'])!!}
    </div>
    {!! Form::close() !!}
</div>
<div class="row">
    @include('includes.form_error')
</div>
@endsection