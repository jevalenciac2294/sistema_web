@if(count($errors) >0)

<div class="alert alert-danger">
    <strong> Se ha producido un erros tio</strong>
    
    <br><br>
    
    <ul>
        @foreach($errors->all as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif