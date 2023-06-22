{{-- {{ dd($games) }} --}}

@extends('admin.layouts.main')

@section('content')
<div class="row table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Rank</th>
          <th scope="col" class="w-auto">Photo</th>
          <th scope="col">Product</th>
          <th scope="col">Harga</th>
          <th scope="col">Transactions</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach ($products as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><div style="width:50px"><img src="{{ asset("assets/img/$product->foto") }}" alt="" class="img img-thumbnail img-fluid mw-50"></div></td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->harga }}</td>
          <td>
            {{ $product->jumlah_transaksi_per_product }}
          </td>
        </tr>
          
      @endforeach
        
      </tbody>
    </table>
  </div>
@endsection

