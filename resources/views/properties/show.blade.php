@extends('layouts.app')

@section('content')
<h2>物件詳細</h2>
<p>物件名: {{ $property->name }}</p>
<p>住所: {{ $property->address }}</p>
<p>緯度: {{ $property->latitude }}, 経度: {{ $property->longitude }}</p>

@if($property->latitude && $property->longitude)
    <div id="vue-property-map" style="height:400px;">
        <property-map :lat="{{ $property->latitude }}" :lng="{{ $property->longitude }}"></property-map>
    </div>
@endif

<h3>担当者割り当て</h3>
<div id="vue-agent-assign">
    <agent-assign :property-id="{{ $property->id }}" :agents="{{ json_encode($property->agents) }}"></agent-assign>
</div>
@endsection