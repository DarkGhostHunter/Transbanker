<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conectando con Webpay...</title>
</head>
<body>
    <form id="redirect" action="{{ $result->url }}?>" method="POST">
        <input type="hidden" name="{{ $result->getTokenName() }}?>" value="{{ $result->token }}">
    </form>
    <script>
        // Redirige al usuario inmediatamente a Webpay
        document.getElementById('redirect').submit();
    </script>
</body>
</html>