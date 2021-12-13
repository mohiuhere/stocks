<?php
include "connection.php";
include "auth.php";
$id = $_SESSION['id'];
$str = "SELECT first_name, last_name, user_name, email, phone_number, role FROM users WHERE id='".$id."';";
$result = mysqli_query($conn,$str);
if(mysqli_num_rows($result)==1){
    $r = mysqli_fetch_assoc($result);
    $first_name = $r['first_name'];
    $last_name = $r['last_name'];
    $user_name = $r['user_name'];
    $email = $r['email'];
    $phone_number = $r['phone_number'];
    $role = $r['role'];
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
    <title>Settings</title>
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
                <label for="first_name"><span class="input-group-text" id="basic-addon1">First Name</span></label>
                <input type="text" name="first_name" value="<?php echo $first_name?>" class="form-control" id="first_name" placeholder="First Name">
            </div>

            <div class="input-group mb-2">
                <label for="last_name"><span class="input-group-text" id="basic-addon1">Last Name</span></label>
                <input type="text" name="last_name" value="<?php echo $last_name?>" class="form-control" id="last_name" placeholder="Last Name">
            </div>

            <div class="input-group mb-2">
                <label for="user_name"><span class="input-group-text" id="basic-addon1">User Name</span></label>
                <input type="text" name="user_name" value="<?php echo $user_name?>" class="form-control" id="user_name" placeholder="User Name">
            </div>

            <div class="input-group mb-2">
                <label for="email"><span class="input-group-text" id="basic-addon1">Email</span></label>
                <input type="email" name="email" value="<?php echo $email?>" class="form-control" id="email" placeholder="name@example.com">
            </div>

            <div class="input-group mb-2">
                <label for="phone_number"><span class="input-group-text" id="basic-addon1">Phone Number</span></label>
                <input type="tel" name="phone_number" value="<?php echo $phone_number?>" class="form-control" id="phone_number" placeholder="+880XXXXXXXXXX">
            </div>
            <div >
                <button type="submit" name="edit" value="Edit" class="btn btn-outline-dark">UPDATE</button>
                <a class="btn btn-dark" href="change-password.php" role="button">CHANGE PASSWORD</a>
            </div>
            

        </form>
    </div>  
</body>
</html>

<?php 
    if(isset($_POST['edit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];

        $str = "UPDATE users SET 
        first_name = '".$first_name."', last_name = '".$last_name."', user_name = '".$user_name."', email = '".$email."',phone_number = '".$phone_number."'
        WHERE id= '".$id."';";

        mysqli_query($conn, $str);
        if($role == "admin"){
            header('location: admin.php');
        }else if($role == "user"){
            header('location: index.php');
        }
        
    }
?>