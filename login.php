<?php
include "connection.php";
//include "auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon_io/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div class="position-relative position-absolute bottom-50 end-50">
        <h2>Login</h2>
        <form action="" method="POST">

        <div class="row mb-3">
            <label for="email" class="form-label col-sm-3 col-form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text" id="inputEmail3">📧</span>
                <input type="email" name="email" placeholder="Email" class="form-control" id="inputEmail3"  aria-describedby="inputEmail3" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="text" name="password" placeholder="Password" class="form-control" style="-webkit-text-security: circle;" id="inputPassword3"  aria-describedby="inputPassword3" required>
            </div>
        </div>

        <button type="submit" name="submit" value="Login" class="btn btn-outline-dark">LOGIN</button>
        </form>
    </div>

</body>
</html>

<?php

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        //echo $email;

        $str = "SELECT * FROM users WHERE email = '".$email."' AND passwd = '".$password."';";

        $result = mysqli_query($conn, $str);
        if(mysqli_num_rows($result) == 1){
            $r = mysqli_fetch_assoc($result);
            if($r['email']== $email && $r['passwd'] ==$password){
                session_start();

                $_SESSION['auth'] = 'true';
                $_SESSION['id'] = $r['id'];

                if($r['role']=="admin"){
                    header('location: admin.php');
                }else if($r['role']=="user"){
                    header('location: index.php');
                }
                
            }else{
                echo "NOT OKAY";
            }
        }else{
            echo "NOT OKAY";
        }
    }

?>