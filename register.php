<?php
$errmsg = array();
if($_POST){
    //POST情報がある時の処理

    //入力チェック
    if(!$_POST['e']){
        $errmsg[] = 'Eメールを入力してください';
    }elseif(strlen($_POST['e']) > 200){
        $errmsg[] = 'Eメールは200文字以内にしてください';
    }

    if(!$_POST['p']){
        $errmsg[] = 'パスワードを入力してください';
    }elseif(strlen($_POST['p']) > 100){
        $errmsg[] = 'パスワードは100文字以内にしてください';
    }

    if($_POST['p'] != $_POST['p2']){
        $errmsg[] = '確認用パスワードが一致しません';
    }

    //リダイレクト
    if(!$errmsg){
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("Location: //$host$uri/login.php");
        exit;
    }
}else{
    //GETの時の処理
}
?>
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
        <h1>ユーザー新規登録</h1>
        <?php
        if($errmsg){
            echo "<div class='alert alert-danger' role='alert'>";
            echo implode('<br>',$errmsg);
            echo "</div>";
        }
        ?>
            <form action="./register.php" method="POST">
                Eメール：<input type="email" name="e" value="" class="form-control"><br>
                パスワード：<input type="password" name="p" value="" class="form-control"><br>
                パスワード（確認）：<input type="password" name="p2" value="" class="form-control"><br>
                <div class="button">
                    <input type="submit" name="register" value="登録" class="btn btn-primary btn-lg">
                </div>
            </form>
        </div>
    </div>
</body>
</html>