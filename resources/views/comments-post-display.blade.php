@extends('layouts.base')

@section('title', 'Show Post')


@section('content')
            <div class="col-md-20 font-semibold text-xl text-gray-800">
                <div class="card">
                    <div class="card-body">
                        <br />
                        <h2>{{ $post->subtitle }}</h2>
                        <p>
                            {{ $post->body }}
                        </p>
                        @include('commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                        <hr />
                        <h4>Kommentar hinzufügen</h4>
                        <form method="post" action="{{ route('storeComment') }}">
                            @csrf
                            <div class="form-group" >
                                <textarea class="form-control" name="body"></textarea>
                                <input type="hidden" name="guest_book_entry_id"  value="{{ $post->id }}" />
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection