@extends('adminlte::page')

@section('title', 'Product Category')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin/shop') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product Category</li>
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
                    <h3 class="card-title">Make Product Category</h3>
                    <button type="button" class="btn btn-default">
                        <a href="{{url(config('setting.prefix', 'admin/shop') . '/category/create')}}">Create Product
                            Category</a>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Icon</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($product_categories))
                        @foreach ($product_categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_slug }}</td>
                            <td><i class="{{ $category->category_icon }}" style="font-size:2em"></i></td>
                            <td><img src="{{asset($category->thumbnail('category_image','small'))}}"
                                    alt="{{ $category->category_name }}"></td>
                            <td class="d-flex justify-content-around">

                                <a
                                    href="{{url(config('shop.prefix', 'admin/shop') . '/category') .'/'.$category->id.'/'.'edit'}}"><button
                                        class="btn btn-warning"><i class="fa fa-edit"></i></button></a>


                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#category-delete-{{ $category->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                {{-- ------------------- Delete Product Category Modal ---------------------------}}
                                @include('shop::layouts.category.delete_modal')
                                {{-- -------------------- End Delete Product Category Modal--------------------------- --}}
                            </td>
                            {{--  @include('blog::layouts.category.confirm_delete') --}}
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Category</th>
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