@extends('Admin.layouts.app')
@section('title', 'ListPesanan')
    @push('css')
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-grid.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-grid.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-reboot.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-reboot.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" type="text/css" />

    @endpush
@section('contentadmin')
    <!-- View Modal -->
    <div class="modal fade" id="modalview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Details Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wrapping-modal-view">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">No</th>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jumlah Pesanan</th>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Harga</th>
                                    <td>Rp. 20.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Produk</th>
                                    <td>Jeans</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Pemesan</th>
                                    <td>Jarwo</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bukti Pembayaran</th>
                                    <td>
                                        <div class="image-bukti-pemabayaran"><img
                                                src="/image/bukti_transfer_1511770644_d1d5a6a2.jpg"
                                                class="bukti-pembayaran" /></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>Pending</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View Edit -->
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah_Pesanan</label>
                            <input type="number" aria-disabled="true" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total Harga</label>
                            <input type="number" aria-disabled="true" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Produk </label>
                            <input type="text" aria-disabled="true" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Pemesan </label>
                            <input type="text" aria-disabled="true" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bukti Pembayaran </label>
                            <div class="image-bukti-pemabayaran"><img
                                src="/image/bukti_transfer_1511770644_d1d5a6a2.jpg"
                                class="bukti-pembayaran" /></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>Pending</option>
                              <option>Success</option>
                              <option>Cancel</option>
                            </select>
                          </div>
                        <button type="submit" class=" btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">status</th>
                    <th scope="col">Total harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Pending</td>
                    <td>Rp.55.000</td>
                    <td class="d-flex justify-content-between">
                        <div class="btn-detail">
                            <button type="button" class="btn-primary" data-toggle="modal"
                                data-target="#modalview">View</button>
                        </div>
                        <div class="btn-edit">
                            <button class="btn-warning" data-toggle="modal" data-toggle="modal"
                                data-target="#modaledit">Edit</button>
                        </div>
                        <div class="btn-hapus">
                            <button class="btn-danger">Hapus</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Pending</td>
                    <td>Rp.55.000</td>
                    <td class="d-flex justify-content-between">
                        <div class="btn-detail">
                            <button type="button" class="btn-primary" data-toggle="modal"
                                data-target="#modalview">View</button>
                        </div>
                        <div class="btn-edit">
                            <button class="btn-warning" data-toggle="modal" data-toggle="modal"
                                data-target="#modaledit">Edit</button>
                        </div>
                        <div class="btn-hapus">
                            <button class="btn-danger">Hapus</button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.js.map') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js.map') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js.map') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js.map') }}"></script>
@endpush
