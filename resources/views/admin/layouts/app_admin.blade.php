<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <base href="/"/>
    @include("admin.layouts.head_admin")
</head>
<body class="hold-transition sidebar-mini layout-fixed">

@include("admin.layouts.nav_admin")
@include("admin.layouts.sidebar_admin")
<main>
    @yield("main")
</main>
@include("admin.layouts.footer_admin")
</body>
@include("admin.layouts.script_admin")
</html>
