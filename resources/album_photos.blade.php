@extends('layouts.app')
@section('content')
    <h2>Album</h2>
    @foreach ($data as $item)
        <img src="{{ $item->source }}" alt="">
    @endforeach
@endsection
