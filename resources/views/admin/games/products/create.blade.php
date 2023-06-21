@extends('admin.layouts.main')

@section('title')
    <h2>Create new product listing</h2>
@endsection

@section('content')

      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show"  role="alert">
          {{ session('success') }}
        </div>
      @endif

    <div class="col-md-10">
    <form style="max-width: 100%" method="post" action="/admin/games/products/" enctype="multipart/form-data">
            
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text"><label for="gameName" class="form-label mb-0">Product name</label></span>
                <input type="text" class="form-control" id="gameName" name="name" required value="{{ old('name') }}">
                              
                <span class="input-group-text"><label for="formFile" class="form-label mb-0">Price</label></span>
                <input class="form-control" type="number" id="harga" name="harga" value="{{ old('harga')}}" step=".01">
                
            </div>
            <div class="mb-3">
            
              <label for="formFile" class="form-label">Product image</label>
                
                <img class="foto-preview img-fluid mb-3 col-sm-2" alt="">
                
              
              <input class="form-control" type="file" id="foto" name="foto"  onchange="previewFoto()">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            
    
        </form>
    </div>

    <script src="{{ URL::asset('js/game-img-preview.js') }}"></script>
      

@endsection