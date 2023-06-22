@extends('admin.layouts.main')

@section('title')
    <h2>Update game</h2>
@endsection

@section('content')
  {{-- {{ dd($game) }} --}}
    <div class="col-md-10">
    <form style="max-width: 100%" method="post" action="/admin/games/{{ $game->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="gameName" class="form-label">Game name</label>
                <input type="text" class="form-control" id="gameName" name="name" required value="{{ old('name', $game->name) }}">
            </div>
            
            <div class="mb-3">
              <label for="formFile" class="form-label">Game image</label>
                @if ($game->foto)
                <img src="{{ asset('/assets/img/' . $game->foto) }}" class="foto-preview img-fluid mb-3 col-sm-2 d-block" alt="">
                @else
                <img class="foto-preview img-fluid mb-3 col-sm-2" alt="">
                @endif
              
              <input class="form-control" type="file" id="foto" name="foto"  onchange="previewFoto()">
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Game banner</label>
                @if ($game->banner)
                <img src="{{ asset('/assets/img/' . $game->banner) }}" class="banner-preview img-fluid mb-3 col-sm-2 d-block" alt="">
                @else
                <img class="banner-preview img-fluid mb-3 col-sm-" alt="">
                @endif
              <img class="banner-preview img-fluid mb-3 col-sm-2" alt="">
              <input class="form-control" type="file" id="banner" name="banner"  onchange="previewBanner()">
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Decription</label>
              <textarea name="deskripsi" id="deskripsi" cols="30" rows="4" required class="form-control">{{ old('deskripsi', $game->deskripsi) }}</textarea>
          </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<script src="{{ URL::asset('js/game-img-preview.js') }}"></script>
    

@endsection