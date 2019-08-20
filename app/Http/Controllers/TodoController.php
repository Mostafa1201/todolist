<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Validator;
Use Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()){
            $todos = Todo::where('user_id',auth()->user()->id)->select('id','content','status')->get();
        }else{
            redirect('/login');
        }
        return view('todos.index',compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'todo' => 'required|max:191',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $todo = new Todo;
            $todo->content = $request->todo;
            $todo->user_id = auth()->user()->id;
            $todo->save();
            session()->flash('success', 'Todo created successfully');
            return redirect('todos');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = [
            'todo' => 'required|max:191',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            $todo = Todo::find($id);
            $todo->content = $request->todo;
            $todo->save();
            session()->flash('success', 'Todo updated successfully');
            return redirect('todos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if($todo && auth()->user()->id == $todo->user_id){
            $todo->delete();
            session()->flash('success', 'Todo deleted successfully');
        }
        return redirect('todos');
    }

    /**
     * Mark Todo that belong to current authenticated user as done.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function markDone(Request $request){
        $todo = Todo::find($request->todoID);
        if($todo->user_id == auth()->user()->id){
            $todo->status = '1';
            $todo->save();
            session()->flash('success', 'Todo done successfully');
            return redirect('todos');
        }
        else{
            return back();
        }
        
    }
}
