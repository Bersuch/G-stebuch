@extends('layouts.base')



@section('title', 'Gästebuch')

@section('content')


<div class="container">
    <h1>Edit Post {{ $user->id }}</h1>
    
    <hr/>
    <form method="POST" action="{{ route('savePost', ['id' => $user->id]) }}">
        @csrf
        <div class="mb-3">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" value="{{ $user->username }}" class="form-control @error('username') is-invalid @enderror" name="username" id="inputUsername" >
        </div>

        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="text" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail" >
        </div>

        <div class="mb-3">
            <label for="inputSubtitle" class="form-label">Subtitel</label>
            <input type="text" value="{{ $user->subtitle }}" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="inputSubtitle" >
        </div>

        <div class="mb-3">
            <label for="inputBody" class="form-label">Body</label>
            <textarea  class="form-control @error('body') is-invalid @enderror" name="body" id="inputBody">{{ $user->body }}</textarea>
        </div>
        
        <div class="mb-3">
            <button class="btn btn-primary">Speichern</button>
        </div>
    </form>
</div>

@endsection