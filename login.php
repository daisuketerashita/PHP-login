<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        div.button{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mx-auto" style="width: 400px;">
            <form action="./login.php" method="POST">
                Eメール：<input type="email" name="e" value="" class="form-control"><br>
                パスワード：<input type="password" name="p" value="" class="form-control"><br>
                <div class="button">
                    <input type="submit" name="login" value="ログイン" class="btn btn-primary btn-lg">
                </div>
            </form>
        </div>
    </div>
</body>
</html>