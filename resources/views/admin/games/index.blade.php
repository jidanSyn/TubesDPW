@extends('admin.layouts.main')

@section('title')
<h2>Games</h2>
@endsection

@section('content')


  <a href="/admin/games/create" class="btn btn-primary mb-3">Add new game</a>
  <div class="row table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="w-auto">Photo</th>
          <th scope="col">Game</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($games as $game)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><div style="width:50px"><img src="{{ asset("assets/img/$game->foto") }}" alt="" class="img img-thumbnail img-fluid mw-50"></div></td>
          <td>{{ $game->name }}</td>
          <td>
            <a class="badge bg-info text-decoration-none" href="/admin/games/{{ $game->id }}"><span  data-feather="eye"></span>See Product details</a>
            <a class="badge bg-warning text-decoration-none" href="/admin/games/{{ $game->id }}/edit"><span  data-feather="edit">Edit</span></a>  
            <form action="/admin/games/{{ $game->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick=""><span  data-feather="x-circle"></span>Delete</button>
            </form>
          </td>
        </tr>
          
      @endforeach
        
      </tbody>
    </table>
  </div>
    
@endsection