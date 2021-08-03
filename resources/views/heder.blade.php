<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>Blog</title>

</head>
<body>
    @if (!Route::is(['admin-home','admin-users_update','admin-posts','admin-update-post']))
        @if (!Route::is(['login','register','admin-log']))
            @include('nvaigation') 
            
            @yield('home')
            @yield('user-profile')
            @yield('new-post')
            @yield('update-post')

            @else
                @yield('regster')
                @yield('login')
                @yield('adminLogin')
            @endif
    @else
        @include('admin.adminNavigation') 
        @yield('admin-home')
        @yield('update-admin-user')
        @yield('admin-all-post')
        @yield('admin-update-post')
    @endif
  


    @include('footer')

   