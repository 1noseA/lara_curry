<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LaraCurry</title>
  @yield('styles')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="navbar">
    <a class="navbar-brand" href="/">ララカレー</a>
  </nav>
</header>
<main>
  @yield('content')
</main>
</body>
<footer>
  <p>テイクアウトインドカレー屋ララカレー</p>
</footer>
</html>