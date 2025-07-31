@extends('layouts.app')

@section('content')
<h1>物件一覧</h1>
<a href="{{ route('properties.create') }}" class="btn btn-primary mb-2">新規物件登録</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>物件名</th>
            <th>住所</th>
            <th>地図</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach($properties as $property)
        <tr>
            <td>{{ $property->id }}</td>
            <td>{{ $property->name }}</td>
            <td>{{ $property->address }}</td>
            <td>
                @if($property->latitude && $property->longitude)
                    <a href="{{ route('properties.show', $property) }}">地図</a>
                @endif
            </td>
            <td>
                <a href="{{ route('properties.show', $property) }}" class="btn btn-sm btn-info">詳細</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection