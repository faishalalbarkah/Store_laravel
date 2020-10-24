@extends('layouts.adminpanel')
@section('title', 'dashboard')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-grid.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-grid.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-reboot.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-reboot.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/drop-zone.css') }}" type="text/css">
    @endpush
@section('admincontent')
    <div class="container">
        <a href="{{ url('adminpanel/voucher/create') }}" class="btn btn-success mb-2">Add Voucher</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Minimal Pembelian</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vouchers as $key => $voucher)
                    <tr>
                        <th scope="row">{{ $vouchers->firstItem() + $key }}</th>
                        <td>{{ $voucher->name }}</td>
                        <td>{{ $voucher->code }}</td>
                        <td>{{ $voucher->discount }}%</td>
                        <td>Rp.{{ number_format($voucher->min_pembelian,0) }}</td>
                        <td>{{ $voucher->description }}</td>
                        <td>
                            <div height="auto">
                                <a href="{{ url('adminpanel/voucher/' . $voucher->id . '/edit') }}"
                                    class="btn btn-warning">Edit</a>
                                <a href="javascript:void(0)" onClick="confirmDelete({{ $voucher->id }})"
                                    class="btn btn-danger">Hapus</a>
                                <form id="form-delete-{{ $voucher->id }}"
                                    action="{{ url('adminpanel/voucher/' . $voucher->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('js')
    <script>
        function confirmDelete(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#form-delete-' + id).submit();
                        swal("Poof! Your data has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
        }

    </script>
@endpush
