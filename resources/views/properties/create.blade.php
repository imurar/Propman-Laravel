@extends('layouts.app')

@section('content')
<h1>物件登録</h1>

<form method="POST" action="{{ route('properties.store') }}">
    @csrf

    <div class="mb-3">
        <label>物件名</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>住所</label>
        <input type="text" name="address" class="form-control">
    </div>

    <div class="mb-3">
        <label>緯度</label>
        <input type="text" name="latitude" class="form-control">
    </div>

    <div class="mb-3">
        <label>経度</label>
        <input type="text" name="longitude" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection
