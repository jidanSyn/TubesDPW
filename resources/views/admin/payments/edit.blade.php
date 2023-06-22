@extends('admin.layouts.main')

@section('title')
    <h2>Update payment method</h2>
@endsection

@section('content')
    <div class="col-md-10">
    <form style="max-width: 100%" method="post" action="/admin/payments/{{ $pembayaran->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            
            <div class="mb-3">
                <label for="paymentName" class="form-label">Payment method name</label>
                <input type="text" class="form-control" id="paymentName" name="name" required value="{{ old('name', $pembayaran->name) }}">
            </div>
            
            <div class="mb-3">
              <label for="formFile" class="form-label">Payment method image</label>
              @if($pembayaran->foto)
              <img src="{{ asset('/assets/img/' . $pembayaran->foto) }}" class="foto-preview img-fluid mb-3 col-sm-2 d-block" alt="">
              @else
                <img class="foto-preview img-fluid mb-3 col-sm-2" alt="">
              @endif
              <input class="form-control" type="file" id="foto" name="foto"  onchange="previewFoto()">
            </div>
            
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        
        <script src="{{ URL::asset('js/game-img-preview.js') }}"></script>
    
        
@endsection