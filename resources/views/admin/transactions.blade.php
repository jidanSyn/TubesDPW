@extends('admin.layouts.main')

@section('title')
<h2>Transactions</h2>
@endsection

@section('content')

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show"  role="alert">
      {{ session('success') }}
    </div>
  @endif

  <div class="row table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="w-auto">User</th>
          <th scope="col">Product</th>
          <th scope="col">UID Game</th>
          <th scope="col">Harga</th>
          <th scope="col">Jenis Pembayaran</th>
          <th scope="col">Waktu Pembelian</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach ($transactions as $transaction)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $transaction->namaUser }}</td>
          <td>{{ $transaction->namaProduct }}</td>
          <td>{{ $transaction->uid_game }}</td>
          <td>{{ $transaction->harga }}</td>
          <td>{{ $transaction->namaPembayaran }}</td>
          <td>{{ $transaction->purchased_on }}</td>
          
        </tr>
          
      @endforeach
        
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center">
    {{ $transactions->links() }}
  </div>
@endsection