<?php
include "connection.php";
include "auth.php";
$id = $_REQUEST['id'];
$str = "SELECT name, price, volume FROM company WHERE id='".$id."';";
$result = mysqli_query($conn,$str);
if(mysqli_num_rows($result)==1){
    $r = mysqli_fetch_assoc($result);
    $name = $r['name'];
    $price = $r['price'];
    $volume = $r['volume'];
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

    <div class="position-relative position-absolute bottom-50 end-50">
        <form action="" method="POST">
            <div class="input-group mb-2">
                <label for="name"><span class="input-group-text" id="basic-addon1">Name</span></label>
                <input type="text" name="name" value="<?php echo $name?>" class="form-control" id="name" placeholder="Name">
            </div>

            <div class="input-group mb-2">
                <label for="price"><span class="input-group-text" id="basic-addon1">Price</span></label>
                <input type="number" step="0.001" name="price" value="<?php echo $price?>" class="form-control" id="price" placeholder="Price">
            </div>

            <div class="input-group mb-2">
                <label for="volume"><span class="input-group-text" id="basic-addon1">Volume</span></label>
                <input type="number" name="volume" value="<?php echo $volume?>" class="form-control" id="volume" placeholder="Volume">
            </div>
            <div >
                <button type="submit" name="edit" value="Edit" class="btn btn-outline-dark">EDIT COMPANY</button>
            </div>
            
        </form>
    </div>  
</body>
</html>

<?php 
    if(isset($_POST['edit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $volume = $_POST['volume'];


        $str = "UPDATE company SET 
        name = '".$name."', price = '".$price."', volume = '".$volume."'
        WHERE id= '".$id."';";

        mysqli_query($conn, $str);
        header('location: company-list.php');
    }
?>