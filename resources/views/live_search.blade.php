search
{!!Form::open(array('url'=>'live_search'))!!}
  {!!Form::text('keyword', null, array('placeholder'=>'search by keyword'))!!}
  {!!Form::submit('search')!!}
{!!Form::close()!!}