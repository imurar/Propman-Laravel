@extends('layouts.app')

@section('content')
    <h1>{{ $property->name }}</h1>
    <div id="vue-property-map">
        <property-map :lat="{{ property->latitude }}" :lng="{{ $property->longitude }}"></property-map>
    </div>
@endsection