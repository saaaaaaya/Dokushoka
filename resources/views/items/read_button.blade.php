@if (Auth::user()->is_reading($item->isbn))
    {!! Form::open(['route' => 'item_user.dont_read', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::submit('Read', ['class' => 'btn btn-sm btn-primary']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'item_user.read']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::submit('Read it', ['class' => 'btn btn-sm btn-outline-secondary']) !!}
    {!! Form::close() !!}
@endif