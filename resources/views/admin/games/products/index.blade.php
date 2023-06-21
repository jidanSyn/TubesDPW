@extends('admin.layouts.main')

@section('title')
<h2>Products - {{ $game->name }}</h2>
    
@endsection

@section('content')

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show"  role="alert">
      {{ session('success') }}
    </div>
  @endif

  <a href="/admin/games/products/create" class="btn btn-primary mb-3">Add new product</a>


  <div class="row table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="w-auto">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($products as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $product->name }}</td>
        <td>{{ $product->harga }}</td>
          <td>
            
            <a class="badge bg-warning text-decoration-none" href="/admin/games/products/{{ $product->id }}/edit"><span  data-feather="edit">Edit</span></a>  
            <form action="/admin/games/products/{{ $product->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="confirm('Are you sure?')"><span  data-feather="x-circle"></span>Delete</button>
            </form>
          </td>
        </tr>
          
      @endforeach
        
      </tbody>
    </table>
  </div>

  @endsection