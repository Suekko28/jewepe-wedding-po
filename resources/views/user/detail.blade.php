@extends('layouts.app')

@section('navbar')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Catalogues</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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
                    <img class="img-fluid" src="{{Storage::url('public/images/' .$data->image)}}" alt="">
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Featured Acticle</p>
                        <h1 class="display-6">{{$data->package_name}}</h1>
                    </div>
                    <p class="mb-4">{!! $data->description !!}</p>
                </div>
                <div class="col-lg-7 ms-auto wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4"> Tertarik Paket ini? Yuk langsung pesan</h4>
                    <form action="">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Nama anda">
                                    <label for="name">Nama Anda</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Alamat email">
                                    <label for="email">Alamat Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="no_telp" placeholder="No handphone">
                                    <label for="no_telp">No Handphone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="date" placeholder="Tanggal pernikahan">
                                    <label for="date">Tanggal Pernikahan</label>
                                </div>
                            </div>
                            <a href="" class="btn btn-primary rounded-pill py-3 px-5">Pesan Paket</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Article End -->
@endsection
