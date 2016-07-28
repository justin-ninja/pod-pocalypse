@extends('layouts.app')

@section('content')
    <div class="row small-up-2 medium-up-3 large-up-4">
        @foreach($availablePods as $availablePod)
            <div class="column">
                @if(Auth::user())
                    <a href="/pod/buy/{{$availablePod->id}}">
                        <img class="thumbnail" src="{{ asset('images/pod-types').'/'.$availablePod->podType->image }}">
                    </a>
                @endif
                @if(Auth::guest())
                    <a href="/login">
                        <img class="thumbnail" src="{{ asset('images/pod-types').'/'.$availablePod->podType->image }}">
                    </a>
                @endif
                <h5>{{ $availablePod->podType->name.' - '.$availablePod->name }}</h5>
                <h6>R{{ $availablePod->price_each }}ea</h6>
                <h6>{{ $availablePod->qty }} left</h6>
            </div>
        @endforeach
    </div>
@endsection
