@extends('front.layout.layout')

@section('content')
    <style>
        #carouselExampleControls {
            height: 504px;
        }

        #carouselExampleControls img {
            height: 100%;
            border-radius: 1.5rem;
        }
    </style>
    <div id="carouselExampleControls" class="carousel slide mt-4" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $slider)
                <div class="carousel-item @if($loop->first) active @endif">
                    <a href="{{ $slider->link }}">
                        <img class="d-block w-100" src="{{ '/storage/sliders/' . ($slider->banner ?? '') }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="game-container">

        <!--New Games -->
        <h3 class="item-title"><i class="fa fa-plus" aria-hidden="true"></i>NEW GAMES</h3>
        <div class="grid-layout grid-wrapper">
            @foreach($new_games as $key => $new_game)
                <div class="grid-item  item-grid">
                    <a href="{{ $new_game->start_path }}" target="_blank">
                        <div class="list-game">
                            <div class="list-thumbnail"><img src="{{ '/storage/game/' . ($new_game->thumbnail ?? '') }}" class="small-thumb" alt="{{ $new_game->title }}"></div>
                            <div class="list-title"><span class="btn btn-sm btn-outline-success">Play Now</span></div>
                            <div class="game-title">{{ $new_game->title }}</div>
                        </div>
                    </a>
                </div>
             @endforeach

        </div>

        <!-- Popular games -->
        <h3 class="item-title"><i class="fa fa-certificate" aria-hidden="true"></i>POPULAR GAMES</h3>
        <div class="grid-layout grid-wrapper">
            @foreach($papular_games as $key => $papular_game)
                <div class="grid-item  item-grid">
                    <a href="{{ $papular_game->start_path }}">
                        <div class="list-game">
                            <div class="list-thumbnail"><img src="{{ '/storage/game/' . ($papular_game->thumbnail ?? '') }}" class="small-thumb" alt="{{ $papular_game->title ?? '' }}"></div>
                            <div class="list-title"><span class="btn btn-sm btn-outline-success">Play Now</span></div>
                            <div class="game-title">{{ $papular_game->title }}</div>
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
                    <a href="{{ $foryou_game->start_path }}">
                        <div class="list-game">
                            <div class="list-thumbnail"><img src="{{ '/storage/game/' . ($foryou_game->thumbnail ?? '') }}" class="small-thumb" alt="{{ $foryou_game->title ?? '' }}"></div>
                            <div class="list-title"><span class="btn btn-sm btn-outline-success">Play Now</span></div>
                            <div class="game-title">{{ $foryou_game->title }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
            
        </div>

    </div>

@endsection