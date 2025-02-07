@extends('layouts.app-admin')

@section('navbar-admin')
    <main>
        <div class="container-xxl flex-grow-1 container-p-y">
            @include('layouts.message')
            <!-- Responsive Table -->
            <div class="card">
                <h5 class="card-header">Report List</h5>
                <div class="table-responsive text-nowrap p-4">
                    <table class="table table-bordered ">
                        <thead>
                            <tr class="text-nowrap text-center">
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Paket</th>
                                <th>Harga</th>
                                <th>Jumlah Pesanan</th>
                                <th>Total Harga</th>
                                <th>Status Publish</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $item)
                                <tr class="text-center">
                                    <td scope="row">{{ $i }}</td>
                                    <td scope="row">
                                        <img src="{{ asset('storage/images/' . $item->catalogue->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td>
                                    <td scope="row">{{ $item->catalogue->package_name }}</td>
                                    <td scope="row">Rp {{ number_format($item->catalogue->price, 2, ',', '.') }}</td>
                                    <td scope="row">{{ $item->total_orders }}</td>
                                    <td scope="row">Rp {{ number_format($item->catalogue->price * $item->total_orders, 2, ',', '.') }}</td>
                                    <td scope="row"
                                        class=" m-5 badge {{ $item->catalogue->status_publish === 'publish' ? 'bg-primary text-white' : 'bg-warning text-white' }}">
                                        {{ $item->catalogue->status_publish === 'publish' ? 'Y' : 'N' }}
                                    </td>

                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-2">{{ $data->links() }}</div>

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
