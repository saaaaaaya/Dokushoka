@if (Auth::user()->is_wanting($item->isbn))
    {!! Form::open(['route' => 'item_user.dont_want', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::submit('Want', ['class' => 'btn btn-sm btn-primary']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'item_user.want']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::submit('Want it', ['class' => 'btn btn-sm btn-outline-secondary']) !!}
    {!! Form::close() !!}
@endif