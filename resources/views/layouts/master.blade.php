<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>

    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body style="background-color: #dfdfdf">

@include('includes.navbar')

@yield('banner')
<div style="padding-top: 6px;">
</div>
@yield('content')

<script>
    $(document).ready(function() {
        $(document).foundation();
    });
</script>