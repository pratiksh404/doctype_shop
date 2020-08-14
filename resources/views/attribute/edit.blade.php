@extends('adminlte::page')

@section('title', 'Edit Product Attribute')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Product Attribute</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin/shop') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin/shop') . '/' . 'attribute') }}">Product
                            Attribute</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Product Attribute</li>
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
                <h3 class="card-title">Edit Product Attribute</h3>
            </div>
            <div class="card-body">
                @if (!empty($attribute))
                <form action="{{ url(config('shop.prefix', 'admin/shop') . '/attribute') .'/'.$attribute->id}}"
                    method="post">
                    @method('PATCH')
                    @csrf
                    @include('shop::layouts.attribute.edit_add')
                </form>
                @endif
            </div>
        </div>
    </div>



    @stop

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    @stop

    @section('js')
    @include('shop::layouts.category.scripts')
    @stop