@extends('layouts.base')



@section('title', 'Gästebuch')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" >

<div class="container">
    <h1>Gästebuch</h1>
    <hr/>
    @include('errors')
    @include('flash-message')

    <p>Hallo Welt aus dem Index Blade</p>
    @include('form')

    @foreach ( $entries as $entry )
        @include('entry')
    @endforeach
        
    @include('pagination')
    
</div>

@endsection