@extends('layouts.main') 
@section('title','Finshed Task') 
@section('content') {{--
<h1>TO DO LIST</h1> --}}
<div class="row-list">


    <table class="table table-sm table-responsive">

        <thead>
            <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>content</th>
                    <th>status</th>
                    <th>start at</th>
                    <th>end at</th>
            </tr>
        </thead>
        <tbody>
            @if ($todo) @foreach ($todo as $item)
            <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->content}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->start_date}}</td>
            <td>{{$item->end_date}}</td>
            </tr>






            @endforeach @endif


        </tbody>
    </table>
</div>

<div class="container">
    <p>{{ $todo->links() }}</p>
</div>

<hr>





@endsection