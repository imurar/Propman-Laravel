@extends('layouts.app')

@section('content')
<h1>物件編集</h1>

<form method="POST" action="{{ route('properties.update', $property->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>物件名</label>
        <input type="text" name="name" class="form-control" value="{{ property->name }}" required>
    </div>

    <div class="mb-3">
        <label>住所</label>
        <input type="text" name="address" class="form-control" value="{{ $property->address }}">
    </div>

    <div class="mb-3">
        <label>緯度</label>
        <input type="text" name="latitude" class="form-control" value="{{ $property->latitude }}">
    </div>

        <div class="mb-3">
        <label>経度</label>
        <input type="text" name="longitude" class="form-control" value="{{ $property->longitude }}">
        </div>
</form>
@endsection