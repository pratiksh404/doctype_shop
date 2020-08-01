<?php

use Illuminate\Support\Facades\Route;

Route::resource('/category', 'ProductCategoryController');

Route::resource('/subcategory', 'ProductSubCategoryController');

Route::resource('/attribute', 'ProductAttributeController');

Route::get('/check_category_slug', 'ProductCategoryController@check_category_slug')->name('check_category_slug');

Route::get('/check_sub_category_slug', 'ProductSubCategoryController@check_sub_category_slug')->name('check_sub_category_slug');
