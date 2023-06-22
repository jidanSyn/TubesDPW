@extends('admin.layouts.main')

@section('title')
<h2>Users</h2>
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
          <th scope="col" class="w-auto">Photo</th>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><div style="width:50px"><img src="{{ asset("assets/img/user-dummy.png") }}" alt="" class="img img-thumbnail img-fluid mw-50"></div></td>
          <td>{{ $user->name }}</td>
          <td>
            <form action="/admin/users" method="post" class="d-inline">
              @csrf
              <button class="badge bg-info border-0" onclick="return confirm('Apakah Anda yakin ingin mengubah user ini menjadi admin?')">
                  <span data-feather="x-circle"></span>Is Admin
              </button>
          </form>
          
          </td>
        </tr>
          
      @endforeach
        
      </tbody>
    </table>
  </div>
    
@endsection