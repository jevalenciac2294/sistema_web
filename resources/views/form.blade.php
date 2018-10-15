<h1>POST</h1>
<form method="get" action="{{url('home/form')}}">
    <label>Name: </label>
    <input type="text" name="name" value="{{$name}}" />
    {{csrf_field()}}
    <button type="submit">Send</button>
</form>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>