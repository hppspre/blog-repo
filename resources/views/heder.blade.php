<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./custome.css">
    
    <title>Blog</title>

</head>
<body>
   
    @if (!Route::is(['login','register']))
        @include('nvaigation')      
    @else
        @yield('home')
    @endif


    @include('footer')

   