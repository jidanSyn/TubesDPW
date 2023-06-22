@extends('layouts.main')

@section('container')
    {{-- listing --}}
    <!-- Section-->
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 mt-5">
                                <!-- Konten bagian kiri (1/4) -->

                                <div class="card mt-5 border border-0 sticky1">
                                    <img src="/assets/img/{{ $game->banner }}" alt="">
                                    <h1>{{ $game->name }}</h1>
                                    <p>{{ $game->deskripsi }}</p>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <!-- Konten bagian kanan (3/4) -->
                                <div class="container">
                                    <div class="row">
                                        <section class="py-5 text-white">
                                            <form action="/product/transaction" method="POST">
                                                @csrf  

                                                <div class="container px-4 px-lg-5 mt-5 justify-content-left">
                                                    <hr>
                                                    <fieldset >
                                                        <legend >Masukkan User ID</legend>
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <label for="uid_game" class="col-form-label"></label>
                                                                <input type="text" name="uid_game" id="uid_game" class="form-control " placeholder="Masukkan UID anda" required>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    
                                                    <fieldset class=" mt-4">
                                                        <hr>
                                                        <legend >Pilih Jumlah TopUp</legend>
                                                        <div class="row gx-2 gx-lg-2 row-cols-2 row-cols-md-4 row-cols-xl-3 justify-content-center text-dark">
                                                            @foreach ($products as $product)
                                                                <div class="col mb-2">
                                                                    <div class="card h-100">
                                                                        <label>
                                                                            <input type="radio" name="product_id" id="topup" class="card-input-element" value="{{ $product->id }}" required/>
                                                                            <div class="panel panel-default card-input">
                                                                                <!-- Product image-->
                                                                                <img class="card-img-top" src="{{ asset('assets/img/'.$product->foto) }}" alt="..." />
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
                                                        @foreach ($pembayaran as $bayar)
                                                        <div class="cards-list1">
                                                            
                                                                <label>
                                                                    <input type="radio" value="{{ $bayar->id }}" name="pembayaran_id" id="pembayaran" class="card-input-element" required/>
                                                                    <div class="panel panel-default .card-input-element:checked">
                                                                        <div class="card1">
                                                                            <div class="card_image1"><img src="/assets/img/{{ $bayar->foto }}" /> </div>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                                
                                                            </div>
                                                            @endforeach
                                                    </fieldset>
                                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                        @if(Auth::check())
                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                        <div class="text-center">
                                                            <input type="submit" class="btn btn-outline-light mt-auto" value="Pesan Sekarang">
                                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                                        </div>
                                                        @else
                                                        <div class="text-center">
                                                            <a class="btn btn-outline-light mt-auto" href="/login" onclick="alert('Please login before purchasing')">Pesan Sekarang</a>
                                                        </div>
                                                        @endif
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
