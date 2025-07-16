@extends('layouts.app')

@section('content')
    <h1>{{ $property->name }}</h1>
    <div id="vue-property-map">
        <property-map></property-map>
    </div>
@endsection