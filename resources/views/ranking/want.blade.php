@extends('layouts.app')

@section('content')
    <h1>Want Ranking</h1>
    @include('items.items', ['items' => $items])
@endsection