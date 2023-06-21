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
                                                <div class="container px-4 px-lg-5 mt-5 justify-content-left">
                                                    <hr>
                                                    <fieldset >
                                                        <legend >Masukkan User ID</legend>
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <label for="uid_game" class="col-form-label"></label>
                                                                <input type="text" id="uid_game" class="form-control " placeholder="Masukkan UID anda" required>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    
                                                    <fieldset class=" mt-4">
                                                        <hr>
                                                        <legend >Pilih Jumlah TopUp</legend>
                                                        <div class="row gx-2 gx-lg-2 row-cols-2 row-cols-md-4 row-cols-xl-3 justify-content-center">
                                                            @foreach ($products as $product)
                                                                <div class="col mb-2">
                                                                    <div class="card h-100">
                                                                        <label>
                                                                            <input type="radio" name="product" class="card-input-element" required/>
                                                                            <div class="panel panel-default card-input">
                                                                                <!-- Product image-->
                                                                                <img class="card-img-top" src="/assets/img/{{ $product->foto }}" alt="..." />
                                                                                <!-- Product details-->
                                                                                <div class="card-body">
                                                                                    <div class="text-center">
                                                                                        <!-- Product name-->
                                                                                        <h6 class="fw-bolder">{{ $product->name }}</h6>
                                                                                        <!-- Product price-->
                                                                                        <p class="fs-6 card-text">Harga: {{ $product->harga }}</p>
                                                                                        <!-- Radio button -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </fieldset>
                                                      
                                                    <hr>
                                                    <fieldset>
                                                        <legend>Pilih Pembayaran</legend>
                                                        <div class="cards-list1">
                                                            @isset($pembayaran)
                                                            @foreach ($pembayaran as $pembayaran)
                                                                <label>
                                                                    <input type="radio" name="pembayaran" class="card-input-element" required/>
                                                                    <div class="card1">
                                                                        <div class="card_image1"> <img src="/assets/img/{{ $pembayaran->foto }}" /> </div>
                                                                        <div class="card_title1 title1-white">
                                                                            <p>{{ $pembayaran->name }}</p>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            @endforeach
                                                            @endisset
                                                        </div>
                                                    </fieldset>
                                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                        <div class="text-center">
                                                            <input type="submit" class="btn btn-outline-dark mt-auto">
                                                        </div>
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
