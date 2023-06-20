@extends('layouts.main')

@section('container')
    {{-- listing --}}
    <!-- Section-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 mt-5">
                                <!-- Konten bagian kiri (1/4) -->
                                <div class="card mt-5 border border-0">
                                    <img src="/assets/img/{{ $game->banner }}" alt="">
                                    <h1>{{ $game->name }}</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo ratione officiis
                                        commodi delectus vitae libero. Accusantium alias, sint debitis ut beatae ratione
                                        omnis libero quia, ullam sit dicta sequi illum!</p>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <!-- Konten bagian kanan (3/4) -->
                                <div class="container">
                                    <div class="row">
                                        <section class="py-5">
                                            <form action="/order" method="POST">
                                                @csrf  
                                                <div
                                                    class="container px-4 px-lg-5 mt-5 justify-content-left">
                                                    <div
                                                        class="row gx-2 gx-lg-2 row-cols-2 row-cols-md-4 row-cols-xl-3 justify-content-center">
                                                        @foreach ($products as $product)
                                                            <div class="col mb-2">
                                                                <div class="card h-100 ">
                                                                    <label>
                                                                        <input type="radio" name="product" class="card-input-element" />
                                                                    <div class="panel panel-default card-input">
                                                                        <!-- Product image-->
                                                                        <img class="card-img-top "
                                                                            src="/assets/img/{{ $product->foto }}"
                                                                            alt="..." />
                                                                        <!-- Product details-->
                                                                        <div class="card-body ">
                                                                            <div class="text-center">
                                                                                <!-- Product name-->
                                                                                <h6
                                                                                    class="fw-bolder">{{ $product->name }}</h6>
                                                                                <!-- Product price-->
                                                                                <p class="fs-6"
                                                                                    class="card-text">Harga: {{ $product->harga }}</p>
                                                                                <!-- Radio button -->
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div
                                                        class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                        <div class="text-center"><button
                                                                class="btn btn-outline-dark mt-auto"
                                                                type="submit">pesan</button></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
