<?php 
include "connection.php";
include "auth.php";

$str = "SELECT * FROM company;";
$result = mysqli_query($conn, $str);
if(mysqli_num_rows($result)>0){
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
    <title>Companys</title>
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
    

        <table class="table table-hover table-dark">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price(Unit)</th>
            <th scope="col">Volume</th>
            <th scope="col">Stocks Draw</th>
            <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
<?php 
foreach($result as $r){ 
?>

            <tr>
            <th scope="row"><?php echo $r['id']; ?></th>
            <td><?php echo $r['name']; echo" "; ?></td>
            <td><i class="fas fa-dollar-sign"></i><?php echo $r['price']; ?></td>
            <td><?php echo $r['volume']; ?></td>
            <td>
                <a href="stocks-draw.php?id=<?php echo $r['id']?> ">Stocks Draw</a>
            </td>
            <td>
                <a href="edit-company.php?id=<?php echo $r['id']?> ">Edit</a>
                <a href="delete-company.php?id=<?php echo $r['id']?> ">Delete</a>
            </td>
            
            </tr>
        </tbody>
<?php
}
}
?>
        </table>
    </body>
</html>
