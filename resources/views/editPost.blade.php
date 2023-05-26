@extends('layouts.base')



@section('title', 'Post bearbeiten')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" >
@foreach ( $posts as $post )
    <div class="container">
    
        <h1>Post bearbeiten</h1>
        <span>von: {{ $post->name }}, gepostet am: {{ Carbon\Carbon::parse($post->created_at)->format('d.m.Y') }}</span>

    

        <hr/>
        <form method="POST" action="{{ route('savePost', ['id' => $post->id]) }}">
            @csrf
            <div class="mb-3">
                <label for="inputSubtitle" class="form-label">Titel</label>
                <input type="text" value="{{ $post->subtitle }}" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="inputSubtitle" >
            </div>

            <div class="mb-3">
                <label for="inputBody" class="form-label">Inhalt</label>
                <textarea  class="form-control @error('body') is-invalid @enderror" name="body" id="inputBody">{{ $post->body }}</textarea>
            </div>
        
            <div class="mb-3">
                <button class="btn btn-primary">Ändern</button>
            </div>
        </form>
    </div>
@endforeach
@endsection