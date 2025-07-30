@extends('layouts.app')

@section('content')
<h1>新規担当者登録</h1>

<form action="{{ route('agents.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>名前</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">登録</button>
</form>
@endsection