@extends('admin.layouts.main')

@section('content')
<h1 class="h2 mb-3">Dashboard</h1>


<div class="col-sm-4">
  <div class="card mx-1" style="width: 18rem;">
    <img src="{{ asset('assets/img/'. $best_game->foto) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">Best Selling Game is {{ $best_game->name }} with {{ $best_game->jumlah_transaksi_per_game }} transactions</p>
      <a href="">See game ranking details</a>
    </div>
  </div>
</div>

<div class="col-sm-4">
  <div class="card mx-1" style="width: 18rem;">
    <img src="{{ asset('assets/img/'. $best_product->foto) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">Best Selling Product is {{ $best_product->name }} with {{ $best_product->jumlah_transaksi_per_product }} transactions</p>
      <a href="">See product ranking details</a>
    </div>
  </div>
</div>

<div class="col-sm-3">
  <div class="card text-bg-primary mb-3 mx-1" style="max-width: 18rem;">
    <div class="card-header">Statistics</div>
    <div class="card-body">
      <p class="card-text">There are {{ $user_count }} users registered and {{ $transaction_count }} transactions</p>
      <a href="/admin/users">See details</a>
    </div>
  </div>
</div>



@endsection