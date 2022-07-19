@extends('front.layout.layout')

@section('content')
    <div class="game-container">
@php
    $theme_key = App\Models\Setting::where('key', 'theme')->first();
    $theme = session()->get('theme') ?? ($theme_key ? $theme_key->value : '');
@endphp
        <!--Category Games -->
        {{-- <h3 class="item-title"><i class="fa fa-gamepad" aria-hidden="true"></i>{{ $cat->title ?? 'Games' }}</h3>  <!-- Update 18 Jul -->  --}}
        <div class="grid-layout grid-wrapper">
            @foreach($cat_games as $key => $cat_game)
                <div class="grid-item item-grid item shadow">
                    @auth
                        <a href="{{ route('home.play', $cat_game->id) }}">
                    @else
                        <a href="#" onclick="openLoginModal();"> 
                    @endauth
                        <div class="list-game mb-3">
                            <div class="list-thumbnail mb-1"><img src="{{ '/storage/game/' . ($cat_game->thumbnail ?? '') }}" class="small-thumb" alt="{{ $cat_game->title }}"></div>
                            {{-- <div class="list-title"><span class="btn btn-sm btn-outline-success">Play Now</span></div> --}}
                            <div class="font-weight-bold text-center {{ $theme && $theme == 'light' ? 'text-dark' : 'text-white' }}">{{ $cat_game->title }}</div>
                        </div>
                    </a>
                </div>
             @endforeach

        </div>

        @if(count($cat_games) === 0)
        <div class="row">
            <div class="col">
                <h3 class="text-center">No Games Yet Here!</h3>
            </div>
        </div>
        @endif

    </div>

@endsection