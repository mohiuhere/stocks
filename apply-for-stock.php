<?php
include "connection.php";
include "auth.php";
$user_id = $_SESSION['id'];
$company_id = $_REQUEST['id'];
$str = "SELECT name, price FROM company WHERE id=$company_id;";
$result = mysqli_query($conn,$str);
if(mysqli_num_rows($result)==1){
    $r = mysqli_fetch_assoc($result);
    $name = $r['name'];
    $cost = 200;
    
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Application Page</title>
    <meta charset="utf-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon_io/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
<body>

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 text-primary" href="index.php">Dashboard</a>

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
                <label for="name"><span class="input-group-text" id="basic-addon1">Name</span></label>
                <input type="text" name="name" value="<?php echo $name?>" class="form-control" id="name" readonly>
            </div>

            <div class="input-group mb-2">
                <label for="price"><span class="input-group-text" id="basic-addon1">Cost</span></label>
                <input type="number" step="0.001" name="price" value="<?php echo $cost?>" class="form-control" id="price" readonly>
            </div>
            
            <div class="input-group mb-2">
                <label for="yes"><span class="input-group-text" id="basic-addon1">If You want to Invest this company type "YES"</span></label>
                <input type="text" name="yes" class="form-control" id="yes">
            </div>
            <div >
                <button type="submit" name="apply" class="btn btn-outline-dark">Apply</button>
            </div>
            
        </form>
    </div>


<?php

if(isset($_POST['apply'])){
    if($_POST['yes'] == "YES"){
        $str = "SELECT * FROM apply WHERE user_id = $user_id AND company_id = $company_id;";
        if(mysqli_num_rows(mysqli_query($conn, $str))==0){

        $str = "INSERT INTO apply(user_id, company_id, cost) VALUES($user_id, $company_id, $cost);";
        mysqli_query($conn, $str);
        }
        header('location: index.php');
    }
}

?>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>    
</body>
</html>

