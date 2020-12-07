@extends('layouts.structure')

@section('content')


    <div class="banner" style="background-image: url(/images/SaveTheHighstreet_OnlineShoppingMarketplace.png)">
    </div>

    <div class="content">

        <div class="card-columns">

            @foreach($shops as $client)

                @if($client->directory)
                <div class="card">

                    <div class="card-image">
                        @if($client->directory->background)
                        <img class="card-img-top" src="{{ $client->directory->background->filename }}" alt="">
                        @endif
                    </div>

                    <div class="card-body">
                        <a href="/member/{{ urlencode($client->title) }}/welcome" target="_newtab">
                            <h2>{{ ucfirst($client->title) }}</h2>
                        </a>
                        <b>
                            @for ($i = 0; $i <= $client->stars; $i++)
                            <i style="color: gold;" class="fa fa-star"></i>
                            @endfor
                        </b>
                        <p class="mt-3">{{ $client->address }}</p>

                        <div class="text-right">
                            <a href="/member/{{ urlencode($client->title) }}/{{ $client->id }}/welcome" target="_newtab">
                                <button class="btn btn-dark">{{ $client->title }} <i class="fa fa-chevron-right"></i> </button>
                            </a>
                        </div>

                    </div>

                </div>
                @endif

            @endforeach

        </div>

        <div id="pagination" style="margin: 0 auto; width: 100%; overflow: auto;">
            {{ $shops->links() }}
        </div>

    </div>

@endsection
