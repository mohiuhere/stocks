<?php
include "connection.php";
include "auth.php";
$id = $_SESSION['id'];
$str = "SELECT first_name, last_name, role FROM users WHERE id='".$id."';";
$result = mysqli_query($conn, $str);
if(mysqli_num_rows($result)==1){
    $r = mysqli_fetch_assoc($result);
    if($r['role'] != "admin"){
        header('location: error401.php');
    }
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
        <title>Admin</title>
        <link rel="icon" href="img/favicon_io/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="https://en.wikipedia.org/wiki/S%26P_500"><i class="fas fa-chart-line"></i> S&P 500</a>
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
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stocks Draw
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="add-user.php">Add User</a>
                                            <a class="nav-link" href="add-company.php">Add Company</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="users-list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                User Table
                            </a>
                            <a class="nav-link" href="company-list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Company Table
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
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-center text-capitalize text-white">
                                    <div class="card-body">Number of User</div>
                                    <div class="card-footer">
<?php 
$str = "SELECT COUNT(id) as total FROM users;";
$result = mysqli_query($conn, $str);
$r = mysqli_fetch_assoc($result)
?>
                                        <p class="h5 text-center text-white"><?php echo $r['total']?></p>
                                    </div>
                                </div>
                            </div>
                            <!--row-->
                            <!--col-->
                                <div class="col-xl-3 col-md-6">
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
                            <!--col-->
                            </div>
                     </div>
                        
                        
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>