@if ($items)
<div class="card-group" style="margin-top:5vh;">
      @foreach ($items as $key => $item)
        <div class="item">
            <div class="col-md-4 col-sm-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ $item->image_url }}" alt="book image" style="height:14vw; width:14vw; display:inline-block;">
                        <div class="card-body" style="width:14vw;">
                            <h6 class="card-title">
                            @if ($item->id) 
                                <p class="item-title"><a href="{{ route('items.show', $item->id) }}">{{ $item->title }}</a></p>
                            @else
                                <p class="item-title">{{ $item->title }}</p>
                            @endif
                            </h6>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                @if (Auth::check())
                                    @include('items.read_button', ['item' => $item])
                                    @include('items.want_button', ['item' => $item])
                                @endif
                            </div>
                            </div>
                                @if (isset($item->count))
                                    <div class="card-footer">
                                        <p class="text-center">No.{{ $key+1 }}: {{ $item->count}} users</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endif