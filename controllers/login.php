<?php
include (MODELS . 'model.php');
include (LIBS . 'Auth.php');
new Auth('teachers');
$report = Auth::login();
?>
<!DOCTYPE html>
<html lang="ru"><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Пример на bootstrap 5: Форма входа - макет и дизайн формы · Версия v5.1.1">
	<title>Форма входа | Signin Template for Bootstrap · v5.1.1</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <?=$style;?>
    <title>Авторизация</title>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .form-signin form {
        max-width: 400px;
        margin: 150px auto;
      }
    </style>   
    
  </head>
  <body class="text-center">
    <div class="container">
        <main class="form-signin">
            <form method="POST">                
                <h1 class="h3 mb-3 fw-normal">Пожалуйста войдите в систему</h1>
                <?php                 
                    if ($report) {
                        echo '<div class="alert alert-danger"><a href="/" class="alert alert-success">На главную</a></div>';
                    } else {
                        echo '<div class="alert alert-danger">Что-то пошло не так!</div>';
                    }                
                ?>
                <div class="form-floating">
                    <input type="text" class="form-control" name="login" placeholder="login">
                    <label for="floatingInput">login</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <label for="floatingPassword">Пароль</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me">Запомнить меня
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>                
            </form>
        </main>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <?=$script;?>

  
</body>
</html>