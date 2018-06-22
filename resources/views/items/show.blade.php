@extends('layouts.app')

@section('content')
<div id="detail">
  <div class="container">
     <div class=row>
       <div class="main">
         <img src="{{ $item->image_url }}" alt="Book image">
             <div class="buttons">
                @if (Auth::check())
                    @include('items.read_button', ['item' => $item])
                    @include('items.want_button', ['item' => $item])
                @endif
             </div>
       </div>
       
       <div class="info offset-1 col-7">
            <h1 class="item-title">{{ $item->title }}</h1>
            <h3 class="item-author">{{ $item->author }}</h3>
         <div class="card text-center">
            <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#">review</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Read users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Want users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="{{ $item->itemurl }}">link</a>
              </li>
            </ul>
            </div>
              <div class="card-body">
                <p class="card-text"><span><img src="/image/quote-left.jpg"></img></span>限りない喪失と再生を描く究極の恋愛小説!暗く重たい雨雲をくぐり抜け、飛行機がハンブルク空港に着陸すると、天井のスピーカーから小さな音でビートルズの『ノルウェイの森』が流れ出した。僕は1969年、もうすぐ20歳になろうとする秋のできごとを思い出し、激しく混乱し、動揺していた。限りない喪失と再生を描き新境地を拓いた長編小説。<span><img src="/image/quote-right.jpg"></img></span></p>
                <a href="#" class="btn btn-primary">Favorite</a>
              </div>
        </div>
       </div>
    </div>
  </div>
</div>       

        
                    <div class="panel-heading text-center">
                        Readしたユーザ
                    </div>
                    <div class="panel-body">
                        @foreach ($read_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="want-users">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Wantしたユーザ
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
            <p class="text-center"><a href="{{ $item->url }}" target="_blank">楽天詳細ページへ</a></p>
        </div>
    </div>
    
    
@endsection