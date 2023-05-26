<form method="POST" action="{{ route('saveEntry', [], false) }}">
    @csrf
    <div class="mb-3">
        <label for="inputSubtitle" class="form-label">Titel</label>
        <input type="text" value="{{ old('subtitle') }}" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" id="inputSubtitle" >
    </div>

    <div class="mb-3">
        <label for="inputBody" class="form-label">Inhalt</label>
        <textarea  class="form-control @error('body') is-invalid @enderror" name="body" id="inputBody">{{ old('username') }}</textarea>
    </div>

    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
    
    <div class="mb-3">
        <button class="btn btn-primary">Posten</button>
    </div>
</form>