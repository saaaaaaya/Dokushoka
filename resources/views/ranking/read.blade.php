@extends('layouts.app')

@section('content')
    <h1>Read Ranking</h1>
    @include('items.items', ['items' => $items])
@endsection