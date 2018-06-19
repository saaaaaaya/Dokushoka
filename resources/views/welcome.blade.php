@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>Welcome to Dokushoka</h1>
                @if (!Auth::check())
                <a href="{{ route('signup.get') }}" class="btn btn-default btn-lg">start</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
    テスト
@endsection