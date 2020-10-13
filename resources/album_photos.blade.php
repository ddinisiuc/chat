@extends('layouts.app')
@section('content')
    @foreach ($data as $item)
        <img src="{{ $item->source }}" alt="">
    @endforeach
@endsection
