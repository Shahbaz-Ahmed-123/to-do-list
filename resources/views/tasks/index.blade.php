@extends('tasks.layout')
<script language="javascript">
    function setLocalTime(time,id) {
        let options = {  
            weekday: "long", year: "numeric", month: "short",  
            day: "numeric", hour: "2-digit", minute: "2-digit"  
        };  
        let localTime= new Date(time).toLocaleString("en-us",options);
        let timeValue = document.getElementById(id);
        timeValue.innerHTML = localTime;
    }
</script> 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tasks</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div> 
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Task Name</th>
            <th>Task Deadline</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->task_name }}</td>
            <td id='{{$key}}' ></td>
            <script>
               var time =  '<?php echo $value->task_deadline ?>' ;
               var key =  '<?php echo $key ?>' ;
               setLocalTime(time,key);
            </script>   
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection