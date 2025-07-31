@extends('layouts.app')

@section('content')
<h1>担当者一覧</h1>
<a href="{{ route('agents.create') }}" class="btn btn-primary mb-2">新規担当者登録</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>Email</th>
            <th>編集</th>
        </tr>
    </thead>
    <tbody>
        @foreach($agents as $agent)
        <tr>
            <td>{{ $agent->id }}</td>
            <td>{{ $agent->name }}</td>
            <td>{{ $agent->email }}</td>
            <td><a href="{{ route('agents.edit', $agent) }}" class="btn btn-sm btn-warning">編集</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
