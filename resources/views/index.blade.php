<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="x-msg-id" content="{{ $msgId }}">

    <title>CryptMSG - бесплатное шифрование сообщений онлайн</title>

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
        <h2>Бесплатное шифрование сообщений</h2>
        Приветствуем вас на нашем сайте, где вы можете <b>бесплатно зашифровать</b> любое ваше <b>текстовое
            сообщение</b>, и например, <b>передать зашифрованное сообщение другу</b>.
        <b>Шифрование сообщений онлайн</b> абсолютно бесплатно, просто <b>вставьте текст</b> в желаемое поле, <b>нажмите
            Сохранить</b>, и ваше <b>надежно зашифрованное сообщение</b> сохранится у нас в зашифрованном виде,
        а вы сможете получить ссылку на это сообщение, и например, передать ее другу. Никто кроме вас <b>не сможет
            прочитать ваше зашифрованное сообщение онлайн</b> при всем желании, потому что ключ от него будет
        доступен только вам.
    </div>
    <div class="row">
        <h2>Как пользоваться сервисом бесплатного шифрования</h2>
        <p>Если вы хотите <b>зашифровать сообщение онлайн бесплатно</b>, просто вставьте <b>текст для шифрования</b>
            в
            поле ввода, и нажмите <b>зашифровать</b>. Появится окно с зашифрованным текстом. Вы можете <b>скопировать
                зашифрованный текст</b>, и сохранить его на своем компьютере, или отправить по e-mail другу.
            <b>Важно!</b>
            Не забудьте <b>сохранить ключ для шифрования</b>, иначе вы не сможете <b>расшифровать сообщение
                онлайн</b>.</p>
        <p>
            Если вы хотите <b>расшифровать сообщение онлайн</b>, вставьте <b>текст для расшифровывания</b> в поле ввода,
            дополнительно, укажите <b>пароль для шифрования</b>, при помощи которого зашифрованное сообщение будет
            расшифровано.
        </p>
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
