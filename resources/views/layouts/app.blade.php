<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <base href="/">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title","Ogani | Shop")</title>
    @yield("before_css")
    @include("layouts.head")
    @yield("after_css")
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

@include("layouts.header")

@include("layouts.nav")



<!-- Product Section Begin -->
<section class="product spad">
    @yield("main")
</section>
<!-- Product Section End -->

@include("layouts.footer")

@yield("before_js")
@include("layouts.script")
@yield("after_js")
</body>
</html>
