@extends('layouts.app')

@section('navbar')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Catalogues</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Catalogues</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Article Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{ Storage::url('public/images/' . $data->image) }}" alt="">
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                    @include('layouts.message')
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Featured Acticle</p>
                        <h1 class="display-6">{{ $data->package_name }}</h1>
                    </div>
                    <p class="mb-4">{!! $data->description !!}</p>
                </div>
                <div class="col-lg-7 ms-auto wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4"> Tertarik Paket ini? Yuk langsung pesan</h4>

                    <form action="{{ route('katalog.order', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="catalogue_id" value="{{ $data->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda" required>
                                    <label for="name">Nama Anda</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Alamat email" required>
                                    <label for="email">Alamat Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="No Handphone" required>
                                    <label for="phone_number">No Handphone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="wedding_date" name="wedding_date" placeholder="Tanggal Pernikahan" required>
                                    <label for="wedding_date">Tanggal Pernikahan</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill py-3 px-5">Pesan Paket</button>
                        </div>
                    </form>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Article End -->
@endsection
