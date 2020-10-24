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
    <div class="fluid-container">
        <table class="table table-borderes">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Address</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Status Order</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Opsi Pengiriman</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Joni</td>
                    <td>Citra Raya Graha Segovia S.35/08</td>
                    <td>085784985</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td></td>
                    <td>Nastar</td>
                    <td>1</td>
                    <td>Nastar Keju</td>
                    <td>Rp 55.000</td>
                    <td>JNE</td>
                    <td>
                        <div height="auto">
                            <a
                                class="btn btn-warning">Edit</a>
                            <a
                                class="btn btn-danger">Hapus</a>
                            {{-- <form id="form-delete-"
                                action="{{ url('adminpanel/listorder/' .) }}" method="POST">
                                @csrf
                                @method('delete')
                            </form> --}}
                        </div>
                    </td>
                </tr>
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
    <script>
        function getimage(id) {
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function(id) {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function(id) {
                modal.style.display = "none";
            }
        }

    </script>

@endpush
