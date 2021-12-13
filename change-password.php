<?php
include "connection.php";
include "auth.php";
$id = $_SESSION['id'];
$str = "SELECT passwd,role FROM users WHERE id='".$id."';";
$result = mysqli_query($conn,$str);
if(mysqli_num_rows($result)==1){
    $r = mysqli_fetch_assoc($result);
    $role = $r['role'];
    $current_password_database = $r['passwd'];
}
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
    <title>Change Password</title>
</head>
<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 text-primary" href=
            <?php 
            if($role == "admin"){?>
            "admin.php"
            <?php ;
            }else if($role == "user"){?> 
            "index.php"
            <?php ;
            }?>
            >Dashboard</a>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    <div class="position-relative position-absolute bottom-50 end-50">
        <form action="" method="POST">
            <div class="input-group mb-2">
                <label for="current_password_input"><span class="input-group-text" id="basic-addon1">Current Password</span></label>
                <input type="text" name="current_password_input" class="form-control" style="-webkit-text-security: circle;" id="current_password_input" placeholder="Current Password">
            </div>

            <div class="input-group mb-2">
                <label for="new_password"><span class="input-group-text" id="basic-addon1">New Password</span></label>
                <input type="text" name="new_password" class="form-control" style="-webkit-text-security: circle;" id="new_password" placeholder="New Password">
            </div>

            <div class="input-group mb-2">
                <label for="confirm_password"><span class="input-group-text" id="basic-addon1">Confirm Password</span></label>
                <input type="text" name="confirm_password" class="form-control" style="-webkit-text-security: circle;" id="confirm_password" placeholder="Confirm Password">
            </div>

            <div >
                <button type="submit" name="edit" value="Edit" class="btn btn-outline-dark">UPDATE PASSWORD</button>
            </div>
        </form>
    </div>  
</body>
</html>

<?php 
    if(isset($_POST['edit'])){
        $current_password_input = $_POST['current_password_input'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        
        if($new_password == $confirm_password && $current_password_database == md5($current_password_input)){
            $new_password = md5($new_password);
            $str = "UPDATE users SET passwd = '".$new_password."' WHERE id= '".$id."';";
            mysqli_query($conn, $str);
            if($role == "admin"){
                header('location: admin.php');
            }else if($role == "user"){
                header('location: index.php');
            }
        }else{
            header('location: error401.php');
        }
    }
?>