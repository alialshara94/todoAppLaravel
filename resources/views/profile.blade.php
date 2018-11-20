@extends('layouts.main') 
@section('title','Profile')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:150px;height:150px; float:left; border-radius: 50%;
        margin-right: 25px;">
            <h1>{{Auth::user()->name}}'s profile</h1>

            <form enctype="multipart/form-data" action="/profile" method="post">
             <label>Update profile picture</label>
             <br>
             <input type="file" name="avatar" >
             @csrf
             <input type="submit" class="pull-right btn brn-sm btn-primary" value="upload file">
            </form>
        </div>
    </div>

</div>
@endsection