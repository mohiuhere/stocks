<?php
include "connection.php";
include "auth.php";
$user_id = $_SESSION['id'];
$str = "SELECT users.first_name, users.last_name, company.name, item.id,item.quantity, item.is_active, item.unit_price
FROM item
INNER JOIN users ON users.id = item.seller_id
INNER JOIN company ON company.id = item.company_id;";
$result = mysqli_query($conn, $str);
if(mysqli_num_rows($result)>0){
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
                        <h1 class="mt-4">Item Feed</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Item</li>
                        </ol>
                        <div class="card mb-4">
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name of Company</th>
                                            <th>Seller Name</th>
                                            <th>Active</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Buy</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name of Company</th>
                                            <th>Seller Name</th>
                                            <th>Active</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Buy</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach($result as $r){?>
                                        <tr>
                                            <td><?php echo $r['name']?></td>
                                            <td><?php echo $r['first_name']." ".$r['last_name']?></td>
                                            <td><?php if($r['is_active']){echo "On";}else{echo "Off";} ?></td>
                                            <td><?php echo $r['quantity']?></td>
                                            <td><?php echo $r['unit_price']?></td>
                                            <td>
                                            <a href="buy-stock.php?id=<?php echo $r['id']?> ">Buy</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php }}?>
                                    </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
