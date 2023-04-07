@extends('layouts.base')



@section('title', 'Profil')

@section('content')




<div class="container text-center">
    <div class="row">
      <div class="col">
        Profilbild
        <div>
          <img src="{{ asset('img/vagabond.jpg') }}" style="max-width:50%;" class="img img-fluid img-thumbnail rounded mx-auto d-block" alt="description of myimage">
        </div>
      </div>
      <div class="col">
        Information:<br/>
        @foreach ($users as $user)
          <p class="text-left">Name: {{ $user->name }}</p>
          <p class="text-left">Email: {{ $user->email }}</p>
        @endforeach
        
      </div>
    </div>
</div>
@endsection