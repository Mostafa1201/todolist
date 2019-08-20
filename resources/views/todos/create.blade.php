<!-- New todo Form -->
<form action="/todos" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <!-- todo Name -->
    <div class="form-group">
        <div class="col-sm-6">
            <input type="text" name="todo" id="todo-content" class="form-control">
        </div>
    </div>

    <!-- Add todo Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> Add todo
            </button>
        </div>
    </div>
</form>