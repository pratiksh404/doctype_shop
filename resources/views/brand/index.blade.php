@extends('adminlte::page')

@section('title', 'Product Brand')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Brand</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin/shop') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product Brand</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@stop


@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Product Brand</h3>

                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#brand-create-modal">
                        Create Product
                        Brand
                    </button>

                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($brands))
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{$brand->brand_name}}</td>
                            <td><img src="{{$brand->brand_image ? asset($brand->thumbnail('brand_image','small')) : ''}}"
                                    alt=""></td>
                            <td class="d-flex justify-content-around">

                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#brand-edit-modal">
                                    <i class="fa fa-edit"></i>
                                </button>

                                {{-- -------------------------Edit Product V Create Modal---------------------------- --}}
                                @include('shop::layouts.brand.modal.edit_modal')
                                {{-- ----------------------------------------------------------------------------------- --}}


                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#brand-delete-modal-{{ $brand->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                {{-- ------------------- Delete Product V Modal ---------------------------}}
                                @include('shop::layouts.brand.modal.delete_modal')
                                {{-- -------------------- End Delete Product V Modal--------------------------- --}}
                            </td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- -------------------------Create Product V Create Modal---------------------------- --}}
@include('shop::layouts.brand.modal.create_modal')
{{-- ------------------------------------------------------------------------------ ---------}}


@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script>
    $(function() {

        // Summernote
                $('.textarea').summernote();

            // Datatable
            $("#datatable").DataTable({
                "responsive": true,
                "autoWidth": true,
                "ordering": true,
                "info": true,
            });

            $('#brand_name').change(function(e) {
                $.get('{{ route('check_brand_slug') }}',
                     { 'brand_name': $(this).val() },
                        function( data ) {
                        $('#brand_slug').val(data.brand_slug);
                     }
                );
            });
        });

</script>
@stop