@extends('layouts.app')

@section('navbar')

    <!-- Store Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Wedding Package Catalogue</p>
                <h1 class="display-6">Choose your wedding catalogue!</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    @foreach ($data as $item)
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="{{Storage::url('public/images/' .$item->image)}}" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">{{$item->package_name}}</h4>
                            <p>{!! $item->description !!}</p>
                            <h4 class="text-primary">Rp {{number_format($item->price, 2, ',', '.')}}</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="{{route('katalog.show', ['id' => $item->id])}}" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Store End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
    
@endsection