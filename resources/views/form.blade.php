<form method="POST" action="{{ route('saveEntry', [], false) }}">
    @csrf
    <div class="mb-3">
        <label for="inputSubtitle" class="form-label">Subtitle</label>
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