{{-- <x-head.tinymce-config/>

<form action="" method="post">
    @csrf
    <textarea id="textarea" name="text"></textarea>
        <button>Submit</button>
</form> --}}

@php
   use Carbon\Carbon;
   $dt = new Carbon;
   $dt->timezone('CET');
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event</title>
    <link rel="stylesheet" href="/css/style-site.css">
</head>
<body>
    <a href="/admin">admin</a>

    <div class="event__show">
        <div>Place: <a href="{{$event->link}}" target='_blank'>{{$event->place}}</a></div>
        <div>Day: {{date('d.m.y', strtotime($event->dateTime))}}</div>
        <div>Time: {{date('H:i', strtotime($event->dateTime))}} PM</div>
        <div>Address: {{$event->address}}</div>
        <div>Link: {{$event->link}}</div>
        <div>Entrance fee: {{$event->entry}} CZK</div>
        <a href="/admin/{{$event->id}}"><button>Edit</button></a>
        <form action="{{action('SiteController@deleteEvent', [$event->id])}}" method="post">
            @method('delete')
            @csrf
        <button >Delete</button>
        </form>
    </div>
</body>
</html>