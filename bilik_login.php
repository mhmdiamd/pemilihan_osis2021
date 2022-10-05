


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

    <style>
        .container{
            height : 100vh;
            margin-bottom:-30px;
        }
        img.login-logo{
            width:100px;
            height: 100px; 
            margin: 0 auto;
            margin-top:20px
        }
        .btn{
            margin:0 auto;
        }
        .card{
            box-shadow:5px 5px #555555;
        }
    </style>

    <title>Osis - Login</title>
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center  ">
        <div class="card" style="width: max-content;">
            <img class="login-logo" src="img/login-logo1.png" alt="logo_login_bilik">
            <h3 class="text-center mt-2">LOGIN</h3>
            <div class="card-body">
                <form action="cek_bilik_login.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputUsername">Username</label>
                        <input type="text" name="user_bilik" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="pwd_bilik" class="form-control" id="exampleInputPassword1" placeholder="Masukan Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>

        
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    -->
  </body>
</html>

