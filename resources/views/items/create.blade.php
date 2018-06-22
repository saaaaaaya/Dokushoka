@extends('layouts.app')

@section('content')
      <div id="search" class="form-row text-center">
                {!! Form::open(['route' => 'items.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="col">
                        {!! Form::text('title', $title, ['class' => 'form-control input-lg', 'placeholder' => 'Title', 'size' => 40]) !!}
                    </div>
                    <div class="col">
                        {!! Form::text('author', $author, ['class' => 'form-control input-lg', 'placeholder' => 'Author name', 'size' => 40]) !!}
                    </div>
                        {!! Form::submit('Search', ['class' => 'btn btn-info btn-lg btn-sm']) !!}
                {!! Form::close() !!}
      </div>
    @include('items.items', ['items' => $items])
@endsection