<?php

use Illuminate\Support\Facades\Route;

Route::resource('/category', 'ProductCategoryController');

Route::resource('/subcategory', 'ProductSubCategoryController');

Route::resource('/attribute', 'AttributeController');

Route::resource('/attrvalue', 'AttributeValueController');

Route::resource('/color', 'ColorController');

Route::resource('/size', 'SizeController');

Route::resource('/brand', 'BrandController');

Route::resource('/product', 'ProductController');

Route::get('/product/{product}/product-image/create', 'ProductImageController@create');

Route::post('/product/{product}/product-image', 'ProductImageController@store');

/* ====================================Check Slug===================================== */
Route::get('/check_category_slug', 'ProductCategoryController@check_category_slug')->name('check_category_slug');

Route::get('/check_sub_category_slug', 'ProductSubCategoryController@check_sub_category_slug')->name('check_sub_category_slug');

Route::get('/check_brand_slug', 'BrandController@check_brand_slug')->name('check_brand_slug');

Route::get('/check_product_slug', 'ProductController@check_product_slug')->name('check_product_slug');
/* ==================================================================================== */
