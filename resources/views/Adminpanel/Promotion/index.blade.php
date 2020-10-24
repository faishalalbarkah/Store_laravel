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
        <a  href="{{ url('adminpanel/promotion/create') }}" class="btn btn-success mb-2" >Add Promotion</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($promotions as $key => $promotion)
                    <tr>
                        <th scope="row">{{ $promotions->firstItem() + $key }}</th>
                        <td>{{ $promotion->title }}</td>
                        <td>
                            <img src="{{ Storage::url($promotion->image) }}" style="width: 200px" class="rounded mx-auto d-block"
                                 />
                        </td>
                        <td>{{ $promotion->description }}</td>
                        <td>
                            <div height="auto">
                                <a href="{{ url('adminpanel/promotion/' . $promotion->id . '/edit') }}" class="btn btn-warning "
                                    >Edit</a>
                                <a href="javascript:void(0)" onClick="confirmDelete({{ $promotion->id }})" class="btn btn-danger "
                                   >Hapus</a>
                                <form id="form-delete-{{ $promotion->id }}"
                                    action="{{ url('adminpanel/promotion/' . $promotion->id) }}" method="POST">
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>

    <script >
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
