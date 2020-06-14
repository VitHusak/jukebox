<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  {{-- link na zkompilovaný css je nutné upravit v webpack.mix.js správnou cestu!!! --}}
  <link rel="stylesheet" href="{{ mix('css/style.css') }}">
</head>
<body>

  {{-- @yield natáhne section  --}}
  @yield('content')

</body>
</html>

