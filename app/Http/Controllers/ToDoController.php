<?php

namespace App\Http\Controllers;

use App\Date;
use App\Http\Requests\TodoCreateRequest;
use App\Photo;
use App\Todolist;
use Auth;
use Illuminate\Http\Request;
use Image;
use Response;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todolist::paginate(5);
        // $todo->paginate(2);
        return view('user.todoviews.index', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.todoviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCreateRequest $request)
    {
        $d_val = array();
        $input = $request->all();
        $user = Auth::user();

        $todo = new Todolist;

        $todo->user_id = $user->id;

        // add image
        if ($file = $request->file('photo_id')) {

            //   $taskImg=$request->file('photo_id');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save(public_path('\uploads\taskImg' . $filename));
            $photo = new Photo();
            $photo->path = $filename;
            $photo->save();
            $todo->photo_id = $photo->id;
        }
        // end image block

        // add date block

        $date = Date::all();
        foreach ($date as $key => $value) {

            $d_val = $value;
        }
        if ($input['start_date'] == $d_val->start_date) {

            $todo->date_id = $d_val->id;
        } else {
            $date = new Date();
            $date->start_date = $input['start_date'];
            $date->save();
            $todo->date_id = $date->id;
        }
        // end date block

        $todo->title = $request->title;
        $todo->content = $request->content;
        $todo->status = $request->status;
        $todo->start_date = $request->start_date;
        $todo->end_date = $request->end_date;

        $todo->save();
        return redirect('todo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $todo = Todolist::findOrFail($id);
        return view('user.todoviews.edit', compact('todo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $d_val = array();
        $input = $request->all();
        $user = Auth::user();

        $todo = new Todolist;

        $todo->user_id = $user->id;

        // add image
        if ($file = $request->file('photo_id')) {

            //   $taskImg=$request->file('photo_id');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save(public_path('\uploads\taskImg' . $filename));
            $photo = new Photo();
            $photo->path = $filename;
            $photo->save();
            $input['photo_id'] = $photo->id;
        }
        // end image block

        // add date block

        $date = Date::all();
        foreach ($date as $key => $value) {

            $d_val = $value;
        }
        if ($input['start_date'] == $d_val->start_date) {

            $todo->date_id = $d_val->id;
        } else {
            $date = new Date();
            $date->start_date = $input['start_date'];
            $date->save();
            $todo->date_id = $date->id;
        }
        // end date block

        $input['title'] = $request->title;
        $input['content'] = $request->content;
        $input['status']= $request->status;
        $input['start_date'] = $request->start_date;
        $input['end_date'] = $request->end_date;

        $todo->whereId($id)->first()->update($input);
        return redirect('todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($task);
        $todo=Todolist::findOrFail($id);
        $todo->delete();
        // echo($todo);
        return back();
        // return redirect('todo');
    }

    public function getByStatus()
    {
        $todo=Todolist::where('status',0)->paginate(5);
        // $todo = Todolist::paginate(5);
        // $todo->paginate(2);
        return view('user.todoviews.status', compact('todo'));
    
    }
}
