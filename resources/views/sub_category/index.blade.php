@extends('adminlte::page')

@section('title', 'Product Sub Category')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Sub Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product Sub Category</li>
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
                    <h3 class="card-title">Make Product Sub Category</h3>
                    <button type="button" class="btn btn-default">
                        <a href="{{url(config('setting.prefix', 'admin') . '/subcategory/create')}}">Create Sub
                            Product Category</a>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Parent Category</th>
                            <th>Sub Category</th>
                            <th>Slug</th>
                            <th>Icon</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($product_sub_categories))
                        @foreach ($product_sub_categories as $sub_category)
                        <tr>
                            <td>{{ $sub_category->id }}</td>
                            <td>{{ $sub_category->category->category_name }}</td>
                            <td>{{$sub_category->sub_category_name}}</td>
                            <td>{{ $sub_category->sub_category_slug }}</td>
                            <td><i class="{{ $sub_category->sub_category_icon }}" style="font-size:2em"></i></td>
                            <td><img src="{{asset($sub_category->thumbnail('sub_category_image','small'))}}"
                                    alt="{{ $sub_category->sub_category_name }}"></td>
                            <td class="d-flex justify-content-around">

                                <a
                                    href="{{url(config('shop.prefix', 'admin') . '/subcategory') .'/'.$sub_category->id.'/'.'edit'}}"><button
                                        class="btn btn-warning"><i class="fa fa-edit"></i></button></a>


                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#sub_category-delete-{{ $sub_category->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                {{-- ------------------- Delete Product Sub Category Modal ---------------------------}}
                                @include('shop::layouts.sub_category.delete_modal')
                                {{-- -------------------- End Delete Product Sub Category Modal--------------------------- --}}
                            </td>
                            {{--  @include('blog::layouts.category.confirm_delete') --}}
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Status</th>
                            <th>Parent Category</th>
                            <th>Sub Category</th>
                            <th>Slug</th>
                            <th>Icon</th>
                            <th>Image</th>
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