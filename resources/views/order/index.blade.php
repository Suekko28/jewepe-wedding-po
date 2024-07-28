@extends('layouts.app-admin')

@section('navbar-admin')
    <main>
        <div class="container-xxl flex-grow-1 container-p-y">
            @include('layouts.message')
            <!-- Responsive Table -->
            <div class="card">
                <h5 class="card-header">Order List</h5>
                <div class="table-responsive text-nowrap p-4">
                    <table class="table table-bordered ">
                        <thead>
                            <tr class="text-nowrap text-center">
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Pemesan</th>
                                <th>Nama Paket</th>
                                <th>Harga</th>
                                <th>Email Pesanan</th>
                                <th>Status Publish</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem(); ?>
                            @foreach ($data as $item)
                                <tr class="text-center">
                                    <td scope="row">{{ $i }}</td>
                                    <td scope="row">
                                        <img src="{{ asset('storage/images/' . $item->catalogue->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td>
                                    <td scope="row">{{ $item->name}}</td>
                                    <td scope="row">{{ $item->catalogue->package_name }}</td>
                                    <td scope="row">Rp {{ number_format($item->catalogue->price, 2, ',', '.') }}</td>
                                    <td scope="row">{{ $item->email }}</td>
                                    <td scope="row"
                                        class="m-5 badge 
                                        @if ($item->status === 'approved') bg-primary text-white
                                        @elseif($item->status === 'requested')
                                            bg-warning text-white @endif">
                                        @if ($item->status === 'approved')
                                            Pesanan Diterima
                                        @elseif($item->status === 'requested')
                                            Menunggu Konfirmasi
                                        @endif
                                    </td>

                                    <td scope="row">
                                        @if ($item->status === 'requested')
                                            <form action="{{ route('order.update', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-primary mb-2">
                                                    <i class="fa fa-check" style="color: white;"></i>
                                                </button>
                                            </form>
                                        @elseif ($item->status === 'approved')
                                            <form action="{{ route('order.update', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger mb-2">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('order.destroy', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mb-2">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                        </tbody>
                        @endforeach
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
<!-- Content -->
