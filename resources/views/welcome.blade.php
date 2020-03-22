<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel to do list</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    <div class="container ">
        <div class="text-center mt-5">
            <h2>To Do List</h2>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('list.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="do_at">Do Date </label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="do_at" name="do_at" value="{{date('Y-m-d')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="topic">Topic</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="topic" name="topic">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </div>
        </form>
        <table class="table table-dark table-bordered">
            <thead>
                <th>Do Date</th>
                <th>Topic</th>
                <th>Status</th>
                <th>Delete</th>
            </thead>
            @foreach ($to_do_lists as $to_do_list)
            <tr>
                <td>{{$to_do_list->do_at}}</td>
                <td>{{$to_do_list->topic}}</td>
                <td>{{$to_do_list->status}}</td>
                <td>
                    <form action="{{route('list.destroy',$to_do_list->id)}}" method="post" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>

            @endforeach
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function(){
        $('.delete-form').on('submit',function(){
            if(confirm("ต้องการจะลบหรือไม่")){
                return true;
            }else{
                return false;
            }
        })
    })
</script>

</html>
