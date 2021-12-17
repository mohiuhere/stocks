<?php 
include "connection.php";
include "auth.php";

$company_id = $_REQUEST['id'];
$seller_id = $_SESSION['id'];
$str = "SELECT first_name, last_name FROM users WHERE id = $seller_id;";
$result = mysqli_query($conn, $str);
if(mysqli_num_rows($result)==1){
    $r = mysqli_fetch_assoc($result);
    $seller_name = $r['first_name'] ." ". $r['last_name'];
}

$str = "SELECT name FROM company WHERE id = $company_id;";
$result = mysqli_query($conn, $str);
if(mysqli_num_rows($result)==1){
    $r = mysqli_fetch_assoc($result);
    $company_name = $r['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title>Sell Stock</title>
        <link rel="icon" href="img/favicon_io/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
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



        <div class="position-relative position-absolute bottom-0 end-50 mb-5">
        <form action="" method="POST">
            <div class="input-group mb-2">
                <label for="name_of_company"><span class="input-group-text" id="basic-addon1">Name of Company</span></label>
                <input type="text" name="name_of_company" value="<?php echo $company_name?>" class="form-control" id="name_of_company" placeholder="Company Name">
            </div>

            <div class="input-group mb-2">
                <label for="seller_name"><span class="input-group-text" id="basic-addon1">Seller Name</span></label>
                <input type="text" name="seller_name" value="<?php echo $seller_name?>" class="form-control" id="seller_name" placeholder="Seller Name">
            </div>

            <div class="input-group mb-2">
                <label for="quantity"><span class="input-group-text" id="basic-addon1">Quantity</span></label>
                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
            </div>

            <div class="input-group mb-2">
                <label for="unit_price"><span class="input-group-text" id="basic-addon1">Unit Price</span></label>
                <input type="number" step="0.001" name="unit_price" class="form-control" id="unit_price" placeholder="Unit Price">
            </div>

            <div class="input-group mb-2">
                    <div class="btn-group" data-toggle="buttons">
                        <label id='active' class="btn ">
                            <input type="radio" name="options" value="1" id="active" autocomplete="off"> Active
                        </label>
                </div>
            </div>
            <div class="input-group mb-2">
                    <div class="btn-group" data-toggle="buttons">
                        <label id='not_active' class="btn ">
                            <input type="radio" name="options" value="0" id="not_active" autocomplete="off"> Not Active
                        </label>
                </div>
            </div>
            <div >
                <button type="submit" name="list" class="btn btn-outline-dark">List</button>
            </div>
            
        </form>
    </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    </body>
</html>

<?php
    if(isset($_POST['list'])){
        $quantity = $_POST['quantity'];
        $unit_price = $_POST['unit_price'];
        $is_active = $_POST['options'];
        $str = "SELECT quantity FROM user_stocks WHERE company_id=$company_id;";
        $result = mysqli_query($conn,$str);
        $r = mysqli_fetch_assoc($result);
        $total = $r['quantity'];
        if($total >= $quantity){
            $str = "INSERT INTO item(company_id, seller_id, is_active, quantity, unit_price) 
            VALUES($company_id, $seller_id, $is_active, $quantity, $unit_price);";
            mysqli_query($conn, $str);
        }
        header('location: item-list.php');
        
    }
?>