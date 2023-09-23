<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title","T2210A Laravel Demo")</title>
    @yield("before_css")
   @include("layouts.head")
    @yield("after_css")
</head>
<body>
@include("layouts.header")
@include("layouts.nav")

<main>
    @yield("main")
</main>
@include("layouts.footer")
</body>
@include("layouts.script")
</html>
