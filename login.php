<?php
$errmsg = array();
if($_POST){
    //POST情報がある時の処理
    //入力チェック
    if(!$_POST['e']){
        $errmsg[] = 'Eメールを入力してください';
    }elseif(mb_strlen($_POST['e'] > 200)){
        $errmsg[] = '200文字以内で入力してください';
    }
    if(!$_POST['p']){
        $errmsg[] = 'パスワードを入力してください';
    }elseif(strlen($_POST['p']) > 100){
        $errmsg[] = 'パスワードは100文字以内にしてください';
    }

    //認証チェック
    $userfile = './userinfo.txt';
    if(file_exists($userfile)){
        $users = file_get_contents($userfile);
        $users = explode("\n",$users);
        foreach($users as $k => $v){
            $v_ary = str_getcsv($v);
                if($v_ary[0] == $_POST['e']){
                    if(password_verify($_POST['p'],$v_ary[1])){
                        //ログイン成功
                        $host = $_SERVER['HTTP_HOST'];
                        $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
                        header("Location: //$host$uri/memberonly.php");
                        exit;
                    }
                }
        }
        $errmsg[] = 'ユーザー名またはパスワードが正しくありません';
    }else{
        $errmsg[] = 'ユーザーリストファイルが見つかりません';
    }

}else{
    //GETの時の処理
    $_POST['e'] = '';
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
        <?php
        if($errmsg){
            echo "<div class='alert alert-danger' role='alert'>";
            echo implode('<br>',$errmsg);
            echo "</div>";
        }
        ?>
            <form action="./login.php" method="POST">
                Eメール：<input type="email" name="e" value="<?php echo htmlspecialchars($_POST['e']); ?>" class="form-control"><br>
                パスワード：<input type="password" name="p" value="" class="form-control"><br>
                <div class="button">
                    <input type="submit" name="login" value="ログイン" class="btn btn-primary btn-lg">
                </div>
            </form>
        </div>
    </div>
</body>
</html>