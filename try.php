


<?php
include "connection.php";
include "auth.php";
$id = 3;
$str = "SELECT name, price, volume FROM company WHERE id='".$id."';";
$result = mysqli_query($conn,$str);
if(mysqli_num_rows($result)==1){
    $r = mysqli_fetch_assoc($result);
    $name = $r['name'];
    $price = $r['price'];
    $volume = $r['volume'];
    $temp_volume = $volume;
}
?>




<?php 


$str = "SELECT id FROM users WHERE role='user';";
        $result = mysqli_query($conn, $str);


        $str = "SELECT COUNT(id) as total FROM users WHERE role='user';";
        $total_user = mysqli_query($conn, $str);
        $t = mysqli_fetch_assoc($total_user);
        $total_user = $t['total'];

        if(mysqli_num_rows($result)==$total_user){
            $array_for_id = array();
            $array_for_stock = array();
            while($row = mysqli_fetch_assoc($result)){

                // add each row returned into an array
                array(
                    $array_for_id[] = $row['id']
                );
                array(
                    $array_for_stock[] = 0
                );
            }
            
            while($volume>100){
    
                $random_number_of_stock = rand(50,100);
                $random_user = rand(0,$total_user-1);
                $array_for_stock[$random_user] = $array_for_stock[$random_user] + $random_number_of_stock;
                $volume = $volume - $random_number_of_stock;
            }
            for($i=0; $i<$total_user;$i++){
                $str = "INSERT INTO user_stocks(user_id, company_id, quantity)
                VALUES($array_for_id[$i], $id, $array_for_stock[$i]);";
                //mysqli_query($conn, $str);
                echo $str;
                echo "<br>";

                $temp_volume = $temp_volume - $array_for_stock[$i];
                echo $temp_volume;
                echo "<br>";
                $str = "UPDATE company SET volume = $temp_volume
                WHERE id= $id;";
                
                echo $str;
                echo "<br>";
            }
            
            //print_r($array_for_id);
            //print_r($array_for_stock);
        }
?>

<!--?
<?php 
$array = array(1 => 0,2 => 1+9,3 => 0,4 => 0,5 => 0,6 => 0,7 => 0,8 => 0,9 => 0,10 => 0,11 => 0,12 => 0,13 => 0,14 => 0);
$volume = 5000;

while($volume>50){
    
    $random_number_of_stock = rand(50,100);

    //echo $random_number_of_stock;
    //echo "  ";
    $random_user = rand(1,14);
    //echo $random_user;
    //echo "  ";
    $total = $array[$random_user] + $random_number_of_stock;
    echo $total;echo ", ";
    $array[$random_user] = $total;
    $volume = $volume - $random_number_of_stock;
}
print_r($array);
?>
?-->