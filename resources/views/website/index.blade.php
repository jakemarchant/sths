@extends('website.layout')

@section('content')

@if($client->directory->background)
<div class="banner" style="background-image: url({{ $client->directory->background->filename }})"></div>
@endif

<div class="content">

    <div class="row">

        <div class="col-md-8">
            <h3>{{ $client->directory->title }}</h3><hr>
            <div class="row">
                <div class="col-md-6">
                    {!! $client->directory->content_left !!}
                </div>
                <div class="col-md-6">
                    {!! $client->directory->content_right !!}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            @foreach($client->directory->media as $image)
                <img src="{{ $image->filename }}" class="image"/>
            @endforeach

            @if($client->directory->media->where('type', 'youtube')->first())
            <iframe style="width: 100%; height: 15em!important; border-radius: 20px; margin-top: 2em;" src="{{ $client->directory->media->where('type', 'youtube')->first()->filename }}" frameborder="0" autoplay loop allowfullscreen></iframe>
            @endif
        </div>

    </div>

</div>

@endsection
