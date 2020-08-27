<?php

use Illuminate\Support\Facades\Route;

Route::resource('/category', 'ProductCategoryController');

Route::resource('/subcategory', 'ProductSubCategoryController');

Route::resource('/attribute', 'AttributeController');

Route::resource('/color', 'ColorController');

Route::resource('/size', 'SizeController');

Route::resource('/brand', 'BrandController');

Route::resource('/product', 'ProductController');

Route::get('/product/{product}/product-image/create', 'ProductImageController@create');

Route::post('/product/{product}/product-image', 'ProductImageController@store');

Route::get('/product/{product}/product-attribute/create', 'ProductAttributeController@create');

Route::post('/product/{product}/product-attribute', 'ProductAttributeController@store');

/* =============== Porduct Dependent field AJAX Requests ===========================*/

Route::post('/product/findsubcategory', 'ProductController@findsubcategory')->name('findsubcategory');

Route::post('/product/findproductattribute', 'ProductController@findproductattribute')->name('productattribute');

/* ================================================================================ */

/* ================== Attribute Value Routes ====================== */
Route::get('/attrvalue/create/{attribute?}', 'AttributeValueController@create');

Route::post('/attrvalue', 'AttributeValueController@store');

Route::delete('/attrvalue/{attrvalue}', 'AttributeValueController@destroy');
/* ================================================================ */

/* ====================================Check Slug===================================== */
Route::get('/check_category_slug', 'ProductCategoryController@check_category_slug')->name('check_category_slug');

Route::get('/check_sub_category_slug', 'ProductSubCategoryController@check_sub_category_slug')->name('check_sub_category_slug');

Route::get('/check_brand_slug', 'BrandController@check_brand_slug')->name('check_brand_slug');

Route::get('/check_product_slug', 'ProductController@check_product_slug')->name('check_product_slug');
/* ==================================================================================== */
