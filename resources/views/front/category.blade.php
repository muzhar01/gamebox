@extends('front.layout.layout')

@section('content')
    <div class="game-container">

        <!--Category Games -->
        <h3 class="item-title"><i class="fa fa-gamepad" aria-hidden="true"></i>{{ $cat->title ?? 'Games' }}</h3>
        <div class="grid-layout grid-wrapper">
            @foreach($cat_games as $key => $cat_game)
                <div class="grid-item item-grid item shadow-lg">
                    <a href="{{ route('home.play', $cat_game->id) }}">
                        <div class="list-game mb-3">
                            <div class="list-thumbnail mb-1"><img src="{{ '/storage/game/' . ($cat_game->thumbnail ?? '') }}" class="small-thumb" alt="{{ $cat_game->title }}"></div>
                            {{-- <div class="list-title"><span class="btn btn-sm btn-outline-success">Play Now</span></div> --}}
                            <div class="font-weight-bold text-center text-white">{{ $cat_game->title }}</div>
                        </div>
                    </a>
                </div>
             @endforeach

        </div>

    </div>

@endsection