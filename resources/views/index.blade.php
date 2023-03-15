@extends('layouts.base')

@section('title', 'Gästebuch')

@section('content')
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