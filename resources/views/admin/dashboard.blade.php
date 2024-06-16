@extends('layouts.app-admin')

@section('navbar-admin')
    <main>
        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <a class="btn btn-primary mb-3" href="{{ url('dashboard-article/create') }}">Tambah Data</a> --}}
            @include('layouts.message')
            <!-- Responsive Table -->
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card h-100">
                        {{-- <img class="card-img-top" src="/assets/admin/assets/img/elements/catalogues.png" alt="Card image cap" /> --}}
                        <div class="card-body">
                            <h5 class="card-title">Total Katalog</h5>
                            <h4 class="card-text">
                                {{$catalogue->count()}}
                            </h4>
                            {{-- <a href="{{route('catalogues')}}" class="btn btn-primary">View List</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card h-100">
                        {{-- <img class="card-img-top" src="/assets/admin/assets/img/elements/catalogues.png" alt="Card image cap" /> --}}
                        <div class="card-body">
                            <h5 class="card-title">Total Semua Pesanan</h5>
                            <h4 class="card-text">
                                {{$order->count()}}
                            </h4>
                            {{-- <a href="{{route('order')}}" class="btn btn-primary">View List</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card h-100">
                        {{-- <img class="card-img-top" src="/assets/admin/assets/img/elements/catalogues.png" alt="Card image cap" /> --}}
                        <div class="card-body">
                            <h5 class="card-title">Total Pesanan Menunggu</h5>
                            <h4 class="card-text">
                                {{$requested->count()}}
                            </h4>
                            {{-- <a href="{{route('catalogues')}}" class="btn btn-primary">View List</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card h-100">
                        {{-- <img class="card-img-top" src="/assets/admin/assets/img/elements/catalogues.png" alt="Card image cap" /> --}}
                        <div class="card-body">
                            <h5 class="card-title">Total Pesanan Diterima</h5>
                            <h4 class="card-text">
                                {{$approved->count()}}
                            </h4>
                            {{-- <a href="{{route('catalogues')}}" class="btn btn-primary">View List</a> --}}
                        </div>
                    </div>
                </div>
                
            </div>
            <!--/ Responsive Table -->
        </div>
        <!-- / Content -->
        @include('layouts.footer-admin')

        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js"
            integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous">
        </script>

    </main>
@endsection
<!-- Content -->
