@extends('adminlte::page')

@section('title', 'Product Attribute')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Attribute</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin/shop') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product Attribute</li>
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
                    <h3 class="card-title">Make Product Attribute</h3>
                    <button type="button" class="btn btn-default">
                        <a href="{{url(config('setting.prefix', 'admin/shop') . '/attribute/create')}}">Create Product
                            Attribute</a>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Attribute Code</th>
                            <th>Attribute Name</th>
                            <th>Input Type</th>
                            <th>Filterable ?</th>
                            <th>Required ?</th>
                            <th>Values</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($attributes))
                        @foreach ($attributes as $attribute)
                        <tr>
                            <td>{{ $attribute->product_attribute_code }}</td>
                            <td>{{ $attribute->product_attribute_name }}</td>
                            <td>{{ $attribute->input_type }}</td>
                            <td><i
                                    class="fa fa-dot-circle text-{{ $attribute->is_filterable ? 'success' : 'danger'}}"></i>
                            </td>
                            <td><i
                                    class="fa fa-dot-circle text-{{ $attribute->is_required ? 'success' : 'danger'}}"></i>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#attribute-value-{{ $attribute->id }}">
                                    <i class="fas fa-database"></i>
                                </button>
                                {{-- ------------------- Delete Product Attribute Modal ---------------------------}}
                                @include('shop::layouts.attribute.attrvalue_modal')
                                {{-- -------------------- End Delete Product Attribute Modal--------------------------- --}}
                            </td>
                            <td class="d-flex justify-content-around">

                                <a
                                    href="{{url(config('shop.prefix', 'admin/shop') . '/attribute') .'/'.$attribute->id.'/'.'edit'}}"><button
                                        class="btn btn-warning"><i class="fa fa-edit"></i></button></a>


                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#attribute-delete-{{ $attribute->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                {{-- ------------------- Delete Product Attribute Modal ---------------------------}}
                                @include('shop::layouts.attribute.delete_modal')
                                {{-- -------------------- End Delete Product Attribute Modal--------------------------- --}}
                            </td>
                            {{--  @include('blog::layouts.Attribute.confirm_delete') --}}
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Attribute Code</th>
                            <th>Attribute Name</th>
                            <th>Input Type</th>
                            <th>Filterable ?</th>
                            <th>Required ?</th>
                            <th>Values</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script>
    $(function() {
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