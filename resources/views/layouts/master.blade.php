<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <title>Image Library</title>

    </head>
    <body>
        <header>
            <div class="container">
                <h1>My Library</h1>
            </div>
        </header>

        <div id="app">

            <nav>
                <div class="links text-right">
                    <router-link to="/">Active</router-link>
                    <router-link to="/deleted">Deleted</router-link>
                </div>
            </nav>

            <router-view></router-view>

        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
