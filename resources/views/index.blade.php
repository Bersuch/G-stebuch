@extends('layouts.base')
@section('title', 'Gästebuch')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" >
<div class="container">
    <h1>Gästebuch</h1>
    <hr/>
    @include('errors')
    @include('flash-message')
    @include('form')
    
    @foreach ( $entries_user as $entry )
            @include('entry')
    @endforeach
    {{ $entries_user }}
</div>

@endsection