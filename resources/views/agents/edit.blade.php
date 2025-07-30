@extends('layouts.app')

@section('content')
<h1>担当者編集</h1>

<form action="{{ route('agents.update', $agent->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>名前</label>
        <input type="text" name="name" class="form-control" value="{{ $agent->name }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $agent->email }}" required>
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
</form>
@endsection
