<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Doctype Admin Shop Tagging Feature
    |--------------------------------------------------------------------------
    |
    | This option define whether to use product tagging feature provided by the
    | package.This package uses https://github.com/rtconner/laravel-tagging
    | 
    */
    'product_tagging' => true,

    /*
    |--------------------------------------------------------------------------
    | Doctype Admin Blog default prefix
    |--------------------------------------------------------------------------
    |
    | This option defines the default prefix of all routes of blog plugins to 
    | your admin panel. The default prefix is admin. You can change the prefix
    | but we highly recommend to use default one.
    */
    'prefix' => 'admin',

    /*
    |--------------------------------------------------------------------------
    | Doctype Admin Blog Middlewares
    |--------------------------------------------------------------------------
    |
    | This option includes all the middleware used by routes of doctype admin
    | blog package.
    | Note: If you don't want activity logging of doctype shop's model simply
    | remove activity middleware
    | 
    */
    'middleware' => ['web', 'auth', 'activity', 'role:admin'],
];
