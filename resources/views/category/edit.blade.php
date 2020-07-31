@extends('adminlte::page')

@section('title', 'Edit Product Category')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Product Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                            href="{{ url(config('setting.prefix', 'admin') . '/' . 'dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Product Category</li>
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
                <h3 class="card-title">Edit Product Category</h3>
            </div>
            <div class="card-body">
                @if (!empty($category))
                <form action="{{ url(config('shop.prefix', 'admin') . '/category') .'/'.$category->id}}" method="post"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('shop::layouts.category.edit_add')
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