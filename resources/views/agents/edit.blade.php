@extends('layouts.app')

@section('content')
<h1>担当者編集</h1>

<form action="{{ route('agent.update', $agent->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>名前</label>
        <input type="text" name="name" class="btn-control" value="{{ $agent->name }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="text">
    </div>
</form>