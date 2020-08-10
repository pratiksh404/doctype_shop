@extends('adminlte::page')

@section('title', 'Create Product Information')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin/shop') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Product Information</li>
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
                    <h3 class="card-title">Create Product Information</h3>
                    <span class="show_product_code textx-secondary"></span>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url(config('shop.prefix', 'admin/shop') . '/product') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @include('shop::layouts.product.edit_add.product_information.product_information_edit_add')
                </form>
            </div>
        </div>
    </div>



    @stop

    @section('css')
    <link rel=" stylesheet" href="{{ asset('css/admin_custom.css') }}">
    @include('shop::layouts.product.links')
    @stop

    @section('js')
    @include('shop::layouts.product.edit_add.product_information.scripts')
    @stop