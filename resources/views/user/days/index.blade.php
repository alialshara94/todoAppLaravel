@extends('layouts.main') 
@section('title','Task Date') 
@section('content') {!! Html::script('js/plugin.js') !!}

<select name="date" id="date_id" class="form-control" style="width:350px">
        <option value="">--- Select Date ---</option>
        @if ($date) @foreach ($date as $item)
        <option value="{{$item->id}}">{{$item->start_date}}</option>
        @endforeach @endif
      </select> {{-- <a href="{{route('date.show','1')}}">ok</a> --}}
<hr>

    <div class="daybody">
        <table class="table table-xl table-responsive table-hover">
            <thead >
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
                
            </tbody> 
            </table>
    </div>


@endsection