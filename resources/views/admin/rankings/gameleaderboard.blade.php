{{-- {{ dd($games) }} --}}

@extends('admin.layouts.main')

@section('content')
<div class="row table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Rank</th>
          <th scope="col" class="w-auto">Photo</th>
          <th scope="col">Game</th>
          <th scope="col">Transactions</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach ($games as $game)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><div style="width:50px"><img src="{{ asset("assets/img/$game->foto") }}" alt="" class="img img-thumbnail img-fluid mw-50"></div></td>
          <td>{{ $game->name }}</td>
          <td>
            {{ $game->jumlah_transaksi_per_game }}
          </td>
        </tr>
          
      @endforeach
        
      </tbody>
    </table>
  </div>
@endsection

