<?php
include "connection.php";
include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="img/favicon_io/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title>Add User</title>
</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 text-primary" href="admin.php">Dashboard</a>

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
<div class="position-relative position-absolute bottom-40 end-50">
        <form action="" method="POST">
            <div class="input-group mb-2">
                <label for="first_name"><span class="input-group-text" id="basic-addon1">First Name</span></label>
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
            </div>

            <div class="input-group mb-2">
                <label for="last_name"><span class="input-group-text" id="basic-addon1">Last Name</span></label>
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
            </div>

            <div class="input-group mb-2">
                <label for="user_name"><span class="input-group-text" id="basic-addon1">User Name</span></label>
                <input type="text" name="user_name" class="form-control" id="user_name" placeholder="User Name">
            </div>

            <div class="input-group mb-2">
                <label for="email"><span class="input-group-text" id="basic-addon1">Email</span></label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
            </div>

            <div class="input-group mb-2">
                <label for="phone_number"><span class="input-group-text" id="basic-addon1">Phone Number</span></label>
                <input type="tel" name="phone_number" class="form-control" id="phone_number" placeholder="+880XXXXXXXXXX">
            </div>

            <div class="input-group mb-2">
                <label for="balance"><span class="input-group-text" id="basic-addon1">Balance</span></label>
                <input type="number" step="0.001" name="balance" class="form-control" id="balance" placeholder="00.00">
            </div>

                <input type="radio" name="role" value="admin" id="admin">
                <label for="admin">Admin</label>
                <br>
                <input type="radio" name="role" value="user" id="user">
                <label for="user">User</label>
                <br>
            <div >
                <button type="submit" name="add" class="btn btn-outline-dark">ADD</button>
            </div>
    
        </form>
</div>

</body>
</html>
<?php
    if(isset($_POST['add'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $role = $_POST['role'];
        $balance = $_POST['balance'];
        $password = md5(123456);

        $str = "SELECT id FROM users WHERE email= '".$email."';";
        $r = mysqli_query($conn, $str);
        if(mysqli_num_rows($r)==0){
            $str = "INSERT INTO users(first_name, last_name, user_name, email, phone_number, role, passwd)
            VALUES('".$first_name."', '".$last_name."', '".$user_name."', '".$email."', '".$phone_number."', '".$role."', '".$password."');";

            mysqli_query($conn, $str);
            header('location: users-list.php');
        }else{
            header('location: error404.php');
        }
        
        $str = "SELECT id FROM users WHERE email='".$email."';";
        $result = mysqli_query($conn, $str);
        if(mysqli_num_rows($result)==1 && $role == "user"){
            $r = mysqli_fetch_assoc($result);
            $id = $r['id'];
            $str = "INSERT INTO user_account(user_id,balance)
            VALUES($id, $balance);";
            mysqli_query($conn, $str);
            
        }
    }
?>