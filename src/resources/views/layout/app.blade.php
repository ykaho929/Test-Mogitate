<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mogitate</title>
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
   

</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" >
                Mogitate
            </a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    

</body>
</html>