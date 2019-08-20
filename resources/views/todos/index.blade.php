@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Todo</div>
                <div class="card-body">
                    <!-- Display Validation Errors -->
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @else
                        @include('errors')    
                    @endif
                    @include('todos.create')
                    <div class="card">
                        <div class="card-header">Todos</div>
                        <div class="card-body">
                            <ul class="card-list">
                                @foreach($todos as $todo)
                                    @if($todo->status == '1')
                                        <li class="card-list-item-done">
                                    @else
                                        <li class="card-list-item">
                                    @endif
                                        <div class="item-buttons-wrapper">
                                            <div class="item-title">
                                                {{ $todo->content }}
                                            </div>
                                            <div class="item-buttons">
                                                <form id="mark-done-form" method="POST" action="{{ url('/todos/done') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="todoID" value="{{$todo->id}}">
                                                    <button class="btn btn-success">Mark Done</button>
                                                </form>
                                                <button data-toggle="modal" data-target="#update-{{ $todo->id }}" class="btn btn-primary">Edit</button>
                                                <button data-toggle="modal" data-target="#delete-{{ $todo->id }}" class="btn btn-danger btn-flat">Delete</button>
                                            </div>
                                        </div>
                                    </li>
                                    <div id="update-{{ $todo->id }}" class="modal" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <form method="POST" action="{{ url('/todos/'.$todo->id) }}">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Todo</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Edit : <input type="text" name="todo" id="todo-id" value="{{$todo->content}}" class="form-control"/>
                                                    </div>
                                                    <div class="modal-footer">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-flat">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="delete-{{ $todo->id }}" class="modal" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Todo</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> Delete : {{ ' ' . $todo->content }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="{{ url('/todos/'.$todo->id) }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger btn-flat">Delete</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        </div>     
                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
