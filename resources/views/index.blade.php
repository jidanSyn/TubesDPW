@extends('layouts.main')


@section('container')
{{-- listing --}}
 <!-- Section-->
 <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3  justify-content-center">
        <form action="/">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Search</button>
              </div>
        </form>
    </div>
 </div>

 @if ($games->count())
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="/assets/img/{{ $games[0]->foto }}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $games[0]->name }}</h5>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('product', $games[0]->slug) }}">View options</a></div>
                    </div>
                </div>
            </div>
            @foreach ($games->skip(1) as $game)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="/assets/img/{{ $game->foto }}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $game->name }}</h5>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('product', $game->slug) }}">View options</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        <div class="d-flex justify-content-center">

            {{ $games->links() }}
        </div>
    </div>
</section>

    
@else
    <p class="text-center fs-4 text-white py-5">No Game Found.</p>
@endif
@endsection

{{-- @include('partials.footer') --}}