@extends('layouts.base')



@section('title', 'Gästebuch')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" >

<div class="container">
    <h1>Gästebuch</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <p>Hallo Welt aus dem Index Blade</p>
    <form method="POST" action="{{ route('index', [], false) }}">
        @csrf
        <div class="mb-3">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" name="username" id="inputUsername" >
        </div>

        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="text" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail" >
        </div>

        <div class="mb-3">
            <label for="inputSubtitle" class="form-label">Subtitel</label>
            <input type="text" value="{{ old('subtitle') }}" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="inputSubtitle" >
        </div>

        <div class="mb-3">
            <label for="inputBody" class="form-label">Body</label>
            <textarea  class="form-control @error('body') is-invalid @enderror" name="body" id="inputBody">{{ old('username') }}</textarea>
        </div>
        
        <div class="mb-3">
            <button class="btn btn-primary">Speichern</button>
        </div>
    </form>

        @foreach ( $entries as $entry )
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $entry->subtitle }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">by {{ $entry->username }} on {{ $entry->created_at->format('d-m-Y') }}</h6>
                    <p class="card-text">{{ $entry->body }}</p>
                    <hr/>
                    <button type="button" class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg> 
                        Edit
                    </button>
                    <button type="button" class="btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg> 
                        Delete
                    </button>

                </div>
            </div>
        @endforeach
        
        @if ($maxPages > 1)
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="{{ route('index', ['page'=>$currentPage-1], false) }}" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>

              @for($page=1; $page<=$maxPages; $page++)
              <li class="page-item @if ($page === $currentPage) active @endif">
                <a class="page-link" href="{{ route('index', ['page'=>$page], false) }}">{{ $page }}</a></li>
              @endfor
              
              <li class="page-item">
                <a class="page-link" href="{{ route('index', ['page'=>$currentPage+1], false) }}" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        @endif 
    
</div>

@endsection