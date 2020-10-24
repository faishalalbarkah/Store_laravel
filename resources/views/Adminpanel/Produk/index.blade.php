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
        <a href="{{ url('adminpanel/produk/create') }}" class="btn btn-success mb-2">Add Product</a>
        {{-- {{ session('name') }} --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Description</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <th scope="row">{{ $products->firstItem() + $key }}</th>
                        <td>{{ $product->name }}</td>
                        <td>Rp. {{ number_format($product->price, 0) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->discount ? "$product->discount %" : "" }}</td>
                        <td>{{ $product->productcategory->name }}</td>
                        <td><img src="{{ Storage::url($product->image) }}" class="rounded mx-auto d-block" width="200px"
                                height="100px" href="javascript:void(0)" alt="Show" id="myImg" onclick="getimage({{$product->id}})" style="width:100%;max-width:300px" />
                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                                <!-- The Close Button -->
                                <span class="close">&times;</span>

                                <!-- Modal Content (The Image) -->
                                <img class="modal-content" id="img01">

                                <!-- Modal Caption (Image Text) -->
                                <div id="caption"></div>
                        </td>
                        <td>
                            <div height="auto">
                                <a href="{{ url('adminpanel/produk/' . $product->id . '/edit') }}"
                                    class="btn btn-warning">Edit</a>
                                <a href="javascript:void(0)" onClick="confirmDelete({{ $product->id }})"
                                    class="btn btn-danger">Hapus</a>
                                <form id="form-delete-{{ $product->id }}"
                                    action="{{ url('adminpanel/produk/' . $product->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
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
    {{-- <script>
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

    </script> --}}

@endpush
