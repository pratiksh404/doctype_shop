@extends('adminlte::page')

@section('title', 'Create Product')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin/shop') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Product</li>
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
                <h3 class="card-title">Create Product</h3>
            </div>
            <div class="card-body">

                <form action="{{ url(config('shop.prefix', 'admin/shop') . '/product')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @include('shop::layouts.product.edit_add')
                </form>

            </div>
        </div>
    </div>



    @stop

    @section('css')
    <link rel=" stylesheet" href="{{ asset('css/admin_custom.css') }}">
    @stop

    @section('js')
    @include('shop::layouts.product.scripts')
    @stop