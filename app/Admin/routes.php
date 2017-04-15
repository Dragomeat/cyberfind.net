<?php

Route::get('', ['as' => 'admin.dashboard', function () {
    return redirect('/admin/feedback');
}]);