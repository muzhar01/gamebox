@extends('front.layout.layout')

@section('content')
    <div class="game-container">

        <!--New Games -->
        <h3 class="item-title"><i class="fa fa-plus" aria-hidden="true"></i>NEW GAMES</h3>
        <div class="grid-layout grid-wrapper">
            @foreach($new_games as $key => $new_game)
                <div class="grid-item  item-grid">
                    <a href="#">
                        <div class="list-game">
                            <div class="list-thumbnail"><img src="/" class="small-thumb" alt="{{ $new_game->title }}"></div>
                            <div class="list-title">
                                <div class="star-rating text-center"><img src="/front_assets/dark-grid/images/star-4.png" alt="rating"></div> {{ $new_game->title }} </div>
                        </div>
                    </a>
                </div>
             @endforeach

        </div>

        <!-- Popular games -->
        <h3 class="item-title"><i class="fa fa-certificate" aria-hidden="true"></i>POPULAR GAMES</h3>
        <div class="grid-layout grid-wrapper">
            @foreach($papular_games as $key => $paular_game)
                <div class="grid-item  item-grid">
                    <a href="#">
                        <div class="list-game">
                            <div class="list-thumbnail"><img src="/" class="small-thumb" alt="{{ $paular_game->title ?? '' }}"></div>
                            <div class="list-title">
                                <div class="star-rating text-center"><img src="/front_assets/dark-grid/images/star-4.png" alt="rating"></div> {{ $paular_game->title ?? '' }} </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- You May Like -->
        <h3 class="item-title"><i class="fa fa-gamepad" aria-hidden="true"></i>YOU MAY LIKE</h3>
        <div class="grid-layout grid-wrapper">
            @foreach($foryou_games as $key => $foryou_game)
                <div class="grid-item  item-grid">
                    <a href="#">
                        <div class="list-game">
                            <div class="list-thumbnail"><img src="/" class="small-thumb" alt="{{ $foryou_game->title ?? '' }}"></div>
                            <div class="list-title">
                                <div class="star-rating text-center"><img src="/front_assets/dark-grid/images/star-4.png" alt="rating"></div> {{ $foryou_game->title ?? '' }} </div>
                        </div>
                    </a>
                </div>
            @endforeach
            
        </div>

    </div>

@endsection