<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>administrace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/css/style-site.css">
</head>
<body>
    @auth
        
   
    <div class="event">
        @if ($isNew)
            <form action="{{ action('SiteController@saveEvent')}}" method="post">         
        @else
            <form action="/admin/{{$event->id}}" method="post">
                @method('put')
        @endif
                
            @csrf
        
            <label for="dateTime">date:</label>
            <div class="container mt-5" style="max-width: 450px">
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker'>
                    <input type='text' name="dateTime" class="form-control" value="{{ isset($event) ? $event->dateTime : '' }}" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
        </div>
            <label for="place">place:</label>
            <input type="text" name="place" value="{{ isset($event) ? $event->place : '' }}">
            <label for="address">address:</label>
            <input type="text" name="address" value="{{ isset($event) ? $event->address : '' }}">
            <label for="link">link:</label>
            <input type="text" name="link" value="{{ isset($event) ? $event->link : '' }}">
            <label for="entry">entrance fee:</label>
            <input type="text" name="entry" value="{{ isset($event) ? $event->entry : '' }}">
            <label for="image_id">image_id:</label>
            <input type="text" name="image_id" value="{{ isset($event) ? $event->image_id : '' }}">
            <button>Submit</button>
        </form>
    </div>

    <div class="eventList">
        @foreach ($events as $event)
            <div><a href="/admin/event/{{$event->id}}">{{date('d.m.y', strtotime($event->dateTime))}} {{$event->place}}</div>
        @endforeach
    </div>
    @endauth
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function() {
       $('#datetimepicker').datetimepicker({
        format: 'YY-MM-DD hh:mm'
       });
    });
</script> 
</html>


