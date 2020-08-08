@extends('adminlte::page')

@section('title', 'Product Size')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Size</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin/shop') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product Size</li>
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
                    <h3 class="card-title">Product Sizes</h3>

                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#size-create-modal">
                        Create Product
                        Size
                    </button>

                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($sizes))
                        @foreach ($sizes as $size)
                        <tr>
                            <td>{{ $size->id }}</td>
                            <td>{{ $size->size }}</td>
                            <td class="d-flex justify-content-around">

                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#size-edit-modal">
                                    <i class="fa fa-edit"></i>
                                </button>

                                {{-- -------------------------Edit Product Size Create Modal---------------------------- --}}
                                @include('shop::layouts.size.modal.edit_modal')
                                {{-- ----------------------------------------------------------------------------------- --}}


                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#size-delete-modal-{{ $size->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                {{-- ------------------- Delete Product Size Modal ---------------------------}}
                                @include('shop::layouts.size.modal.delete_modal')
                                {{-- -------------------- End Delete Product Size Modal--------------------------- --}}
                            </td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- -------------------------Create Product Size Create Modal---------------------------- --}}
@include('shop::layouts.size.modal.create_modal')
{{-- ------------------------------------------------------------------------------ ---------}}


@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script>
    $(function() {
        // Color Picker
        $('.my-colorpicker2').colorpicker()

            // Datatable
            $("#datatable").DataTable({
                "responsive": true,
                "autoWidth": true,
                "ordering": true,
                "info": true,
            });
        });

</script>
@stop