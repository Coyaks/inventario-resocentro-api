<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



<main>
    <h1>Log In</h1>
    <form action="/api/admin/auth/login" method="POST">
        <p><input type="email" name="email" placeholder="Email"></p>
        <p><input type="password" name="password" placeholder="Password"></p>
        <button type="submit">Enviar</button>
    </form>
</main>

</body>
</html>
