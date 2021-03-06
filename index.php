<?php
include "connection.php";
include "auth.php";
$user_id = $_SESSION['id'];
$str = "SELECT first_name, last_name, role FROM users WHERE id= $user_id;";
$result = mysqli_query($conn, $str);
if(mysqli_num_rows($result)==1){
    $r = mysqli_fetch_assoc($result);
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
        <title>index</title>
        <link rel="icon" href="img/favicon_io/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="https://en.wikipedia.org/wiki/S%26P_500">S&P 500</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="edit-profile.php">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="user-stock-list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                My Stocks
                            </a>
                            <a class="nav-link" href="item-list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Item Feed
                            </a>
                            
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active text-capitalize">
                                <?php echo $r['first_name']; echo" "; echo $r['last_name']; echo" ("; echo $r['role']; echo ")"?>
                            </li>
                        </ol>
                        <!--row-->
                        <div class="row ml-4">
                            <div class="col-xl-3 col-md-6 ml-auto">
                                <div class="card bg-success text-center text-capitalize text-white">
                                    <div class="card-body">Account Balance</div>
                                    <div class="card-footer">
<?php 
$str = "SELECT balance FROM user_account WHERE user_id=$user_id;";
$result = mysqli_query($conn, $str);
$r = mysqli_fetch_assoc($result)
?>
                                        <p class="h5 text-center text-white"><i class="fas fa-dollar-sign"></i><?php echo $r['balance']?></p>
                                    </div>
                                </div>
                            </div>
                            <!--row-->
                            <!--col-->
                                <div class="col-xl-3 col-md-6 ml-auto">
                                    <div class="card bg-danger text-center text-capitalize text-white">
                                        <div class="card-body">Number of Company</div>
                                        <div class="card-footer">
                                        <?php 
$str = "SELECT COUNT(id) as total FROM company;";
$result = mysqli_query($conn, $str);
$r = mysqli_fetch_assoc($result)
?>
                                            <p class="h5 text-center text-white"><?php echo $r['total']?></p>
                                        </div>
                                    </div>
                                </div>
<?php 
$str = "SELECT * FROM company;";
$result = mysqli_query($conn, $str);
if(mysqli_num_rows($result)>0){
?>
                               <div class="col-xl-3 btn btn-success dropdown ml-auto">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Company: Apply For Stock
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
<?php 
foreach($result as $r){
?>
                                <a class="dropdown-item" href="apply-for-stock.php?id=<?php echo$r['id']?>"><?php echo $r['name']?></a>
<?php
}
?>
                                </div>
                                </div>
<?php
}
?>
                            <!--col-->
                            
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