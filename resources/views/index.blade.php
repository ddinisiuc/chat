@extends('layouts.app')
@section('content')
<h1>index page</h1>
    <example-component></example-component>
    <props-component :arr={{json_encode($arr)}}></props-component>
    <ajax-component></ajax-component>
    <chartline-component></chartline-component>
    <piechart-component></piechart-component>
    <socket-component></socket-component>
@endsection
