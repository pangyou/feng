<?php 

Route::get('index.html','Home/Index/index');
Route::get('l_{cid}.html','Home/List/index');
Route::get('t_{tid}.html','Home/List/index');
Route::get('c_{aid}.html','Home/Content/index');