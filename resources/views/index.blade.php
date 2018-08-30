<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="x-msg-id" content="{{ $msgId }}">

    <title>CryptMSG - шифрование сообщений онлайн</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>

</head>
<body>
@include('navbar')
<div class="container">
    <div class="row" id="app">
        <msg-widget></msg-widget>
    </div>
    <div class="row">
        <h2>Варианты использования</h2>
        <ul>
            <li>Вы можете <b>зашифровать онлайн</b> какое-либо сообщение, содержащее важную информацию личного
                характера, например, <b>зашифровать пароль</b> от социальной сети
            </li>
            <li>Как промежуточное звено в играх-головоломках</li>
            <li>И многое другое...</li>
        </ul>
    </div>
</div>
</body>
</html>
