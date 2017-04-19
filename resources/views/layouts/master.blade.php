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

<div class="row">
@yield('content')
</div>
<script>
    $(document).ready(function() {
        $(document).foundation();
    });
</script>

</body>
</html>