@extends('layouts.app')

@section('content')
    <div class="row small-up-1 medium-up-2 large-up-2">
        <div class="column">
            <h3>New Pod Type</h3>
            <form action="/pod/type/create" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="name">Name:
                    <input type="text" name="name">
                </label>
                <label for="pod_type_image" class="button">Upload File</label>
                <input type="file" id="pod_type_image" name="pod_type_image" class="show-for-sr">
                <button type="submit" class="button success">add</button>
            </form>
        </div>
        <div class="column">
            <h3>New Pod</h3>
            <form action="/pod/create" method="POST">
                {{ csrf_field() }}
                <label for="pod_type_id">Type
                    <select name="pod_type_id" id="pod_type_id">
                        @foreach($podTypes as $podType => $value)
                            <option value="{{ $value }}">{{ $podType }}</option>
                        @endforeach
                    </select>
                </label>
                <label for="name">Name:
                    <input type="text" name="name">
                </label>
                <label for="cost_each">Cost each:
                    <input type="text" name="cost_each">
                </label>
                <label for="price_each">Price each:
                    <input type="text" name="price_each">
                </label>
                <label for="qty">Qty available:
                    <input type="number" name="qty">
                </label>
                <lable for="remove_from_kitty">
                    Deduct from Kitty
                    <input type="checkbox" name="remove_from_kitty" value="true">
                </lable>
                <br>
                <button type="submit" class="button success">add</button>
            </form>
        </div>
    </div>
    <div class="row small-up-1 medium-up-2 large-up-2">
        @foreach($availablePods as $availablePod)
            <div class="column">
                <img class="thumbnail" src="{{ asset('images/pod-types').'/'.$availablePod->podType->image }}">
                <h5>{{ $availablePod->podType->name.' - '.$availablePod->name }}</h5>
                <form action="/pod/update/{{$availablePod->id}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row small-up-1 medium-up-2 large-up-2">
                        <div class="column">
                            <label for="cost_each">Cost each</label>
                        </div>
                        <div class="column">
                            <input type="text" name="cost_each" value="{{ $availablePod->cost_each }}">
                        </div>
                    </div>
                    <div class="row small-up-1 medium-up-2 large-up-2">
                        <div class="column">
                            <label for="cost_each">Price each</label>
                        </div>
                        <div class="column">
                            <input type="text" name="price_each" value="{{ $availablePod->price_each }}">
                        </div>
                    </div>
                    <div class="row small-up-1 medium-up-2 large-up-2">
                        <div class="column">
                            <label for="cost_each">Qty Available</label>
                        </div>
                        <div class="column">
                            <input type="text" name="qty" value="{{ $availablePod->qty }}">
                        </div>
                    </div>
                    <div class="row small-up-1 medium-up-2 large-up-2">
                        <div class="column">
                            <button type="submit" class="button success">update</button>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
@endsection
