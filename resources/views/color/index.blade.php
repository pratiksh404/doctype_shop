@extends('adminlte::page')

@section('title', 'Product Color')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Color</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin/shop') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product Color</li>
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
                    <h3 class="card-title">Product Color</h3>

                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#color-create-modal">
                        Create Product
                        Color
                    </button>

                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($colors))
                        @foreach ($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td style="background-color: {{ $color->color }}"></td>
                            <td class="d-flex justify-content-around">

                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#color-edit-modal">
                                    <i class="fa fa-edit"></i>
                                </button>

                                {{-- -------------------------Edit Product Color Create Modal---------------------------- --}}
                                @include('shop::layouts.color.modal.edit_modal')
                                {{-- ----------------------------------------------------------------------------------- --}}


                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#color-delete-modal-{{ $color->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                {{-- ------------------- Delete Product Color Modal ---------------------------}}
                                @include('shop::layouts.color.modal.delete_modal')
                                {{-- -------------------- End Delete Product Color Modal--------------------------- --}}
                            </td>

                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- -------------------------Create Product Color Create Modal---------------------------- --}}
@include('shop::layouts.color.modal.create_modal')
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