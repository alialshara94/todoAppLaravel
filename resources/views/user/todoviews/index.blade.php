@extends('layouts.main') 
@section('title','TO-DO List') 
@section('content') {{--
<h1>TO DO LIST</h1> --}}
<div class="row-list">


    <table class="table table-sm table-responsive">

        <thead>
            <tr>
                <th>status</th>
                <th>to-do</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @if ($todo) @foreach ($todo as $item)
            <tr>
                <td>
                    <label class="customcheck">
                                <input type="checkbox" >
                                <span class="checkmark"></span>
                            </label>
                </td>
                <td>{{$item->title}}</td>
                <td>



                    <a href="#" type="button" class="btnshow btn btn-primary btn-circle" data-id="{{$item->id}}" data-title="{{$item->title}}"
                        data-content="{{$item->content}}" data-status="{{$item->status}}" data-photo_id="{{$item->photo_id}}"
                        data-start_date="{{$item->start_date}}" data-end_date="{{$item->end_date}}" data-toggle="modal" data-target="#show"><i class="glyphicon glyphicon-eye-open"></i></a >
                    <a href="{{ route('todo.edit',$item->id) }}" type="button" class="btn btn-secondary btn-circle"><i class="glyphicon glyphicon-edit"></i></a >
                    <a class="btn btn-danger btn-circle remove-record" data-toggle="modal" data-url="{{ route('todo.destroy',$item->id) }}" data-id="{{$item->id}}" data-target="#custom-width-modal"><i class="glyphicon glyphicon-trash"></i></a>                    {{-- <button data-taskid="{{$item->id}} " class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-trash"></i></button>                    --}} {{-- href="{{ route('todo.destroy',$item->id) }}" --}}





                </td>
            </tr>






            @endforeach @endif


        </tbody>
    </table>
</div>

<div class="container">
    <p>{{ $todo->links() }}</p>
</div>

<hr>

<div class="add-new">


    <a href="{{ route('todo.create') }}" class="create-modal btn btn-sm btn-primary " id="add"><span class="glyphicon glyphicon-plus-sign" ></span> add</a>

</div>


{!! Html::script('js/plugin.js') !!}

<!-- Delete Model -->
<form action="" method="POST" class="remove-record-model">
    @csrf
    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete Task</h4>
                </div>
                <div class="modal-body">
                    <h4>You Want You Sure Delete This Record?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>


{{-- modal view task --}}

<!-- Modal -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {{--
                <p>{{ $item->title}}</p>
                <p>{{ $item->content}}</p> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
@endsection