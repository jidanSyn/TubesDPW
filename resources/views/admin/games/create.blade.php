@extends('admin.layouts.main')

@section('title')
    <h2>Create new game</h2>
@endsection

@section('content')
    <div class="col-md-4">
        <form style="max-width: 100%" action="post" action="/admin/games" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class="col-md-3">
        <img src="/assets/img/genshin.jpg" class="img img-fluid mb-2">
        <input type="file" name="" id="">
    </div>
    <div class="col-md-5">
        <img src="/assets/img/genshin.jpg" class="img img-fluid mb-2">
        <input type="file" name="" id="">
    </div>
    

        </form>
@endsection