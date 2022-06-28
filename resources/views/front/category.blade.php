@extends('front.layout.layout')

@section('content')
    <div class="game-container">

        <!--Category Games -->
        <h3 class="item-title"><i class="fa fa-gamepad" aria-hidden="true"></i>{{ $cat_name ?? 'Games' }}</h3>
        <div class="grid-layout grid-wrapper">
            @foreach($cat_games as $key => $cat_game)
                <div class="grid-item  item-grid">
                    <a href="{{ $cat_game->start_path }}">
                        <div class="list-game">
                            <div class="list-thumbnail"><img src="{{ '/storage/game/' . ($cat_game->thumbnail ?? '') }}" class="small-thumb" alt="{{ $cat_game->title }}"></div>
                            <div class="list-title">
                                <div class="star-rating text-center"><img src="/front_assets/dark-grid/images/star-4.png" alt="rating"></div> {{ $cat_game->title }} </div>
                        </div>
                    </a>
                </div>
             @endforeach

        </div>

    </div>

@endsection