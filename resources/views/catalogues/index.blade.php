@extends('layouts.app-admin')

@section('navbar-admin')
    <main>
        <div class="container-xxl flex-grow-1 container-p-y">
            <a class="btn btn-primary mb-3" href="{{ url('catalogues/create') }}">Tambah Data</a>
            @include('layouts.message')
            <!-- Responsive Table -->
            <div class="card">
                <h5 class="card-header">Catalogues List</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-nowrap text-center">
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Package Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem(); ?>
                            @foreach ($data as $item)
                                <tr class="text-center">
                                    <td scope="row">{{ $i }}</td>
                                    <td scope="row">
                                        <img src="{{ asset('storage/images/' . $item->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td>
                                    <td scope="row">{{ $item->package_name}}</td>
                                    <td scope="row">{!! $item->description !!}</td>
                                    <td scope="row">Rp {{ number_format($item->price, 2, ',', '.') }}</td>
                                    <td scope="row"
                                        class="mx-auto mt-5 badge {{ $item->status_publish === 'publish' ? 'bg-primary text-white' : 'bg-warning text-white' }}">
                                        {{ $item->status_publish }}
                                    </td>
                                    <td scope="row">
                                        <a href="{{ url('catalogues/' . $item->id) . '/edit' }}"
                                            class="btn btn-warning mb-2"><i class=" fa fa-solid fa-pen-to-square"
                                                style="color:white;"></i></a>
                                        <form action="{{ url('catalogues/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mb-2"><i
                                                    class="fa fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                        </tbody>
                        @endforeach
                    </table>
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
