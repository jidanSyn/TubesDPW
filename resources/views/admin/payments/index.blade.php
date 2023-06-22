@extends('admin.layouts.main')

@section('title')
<h2>Payment methods</h2>
@endsection


@section('content')

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show"  role="alert">
      {{ session('success') }}
    </div>
  @endif

  <a href="/admin/payments/create" class="btn btn-primary mb-3">Add new payment</a>
  <div class="row table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Photo</th>
          <th scope="col" class="w-auto">Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($payments as $payment)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><div style="width:50px"><img src="{{ asset("assets/img/$payment->foto") }}" alt="" class="img img-thumbnail img-fluid mw-50"></div></td>
          <td>{{ $payment->name }}</td>
          <td>
            {{-- <a class="badge bg-info text-decoration-none" href="/admin/payments/{{ $payment->slug }}"><span  data-feather="eye"></span>See Product details</a> --}}
            <a class="badge bg-warning text-decoration-none" href="/admin/payments/{{ $payment->slug }}/edit"><span  data-feather="edit">Edit</span></a>  
            <form id="delete-payment" action="/admin/payments/{{ $payment->slug }}" method="post" class="d-inline">
              @method('DELETE')
              @csrf    
              <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span  data-feather="x-circle">Delete</span></button>
            </form>
          </td>
        </tr>
          
      @endforeach
        
      </tbody>
    </table>
  </div>
    
@endsection