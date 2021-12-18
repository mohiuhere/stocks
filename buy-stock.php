<?php
include "connection.php";
include "auth.php";
$buyer_id = $_SESSION['id'];
$item_id = $_REQUEST['id'];
$str = "SELECT * FROM item WHERE id = $item_id;";
$result = mysqli_query($conn, $str);
if(mysqli_num_rows($result) == 1){
    $r = mysqli_fetch_assoc($result);
    $seller_id = $r['seller_id'];
    $total_cost = $r['unit_price']*$r['quantity'];
    $company_id = $r['company_id'];
    $item_stock = $r['quantity'];



    $str = "SELECT quantity FROM user_stocks WHERE user_id = $buyer_id AND company_id = $company_id;";
    $current_buy_stock = mysqli_query($conn, $str);
    $cbs = mysqli_fetch_assoc($current_buy_stock);
    $current_buy_stock = $cbs['quantity'];

    $str = "SELECT quantity FROM user_stocks WHERE user_id = $seller_id AND company_id = $company_id;";
    $current_sell_stock = mysqli_query($conn, $str);
    $css = mysqli_fetch_assoc($current_sell_stock);
    $current_sell_stock = $css['quantity'];

    $str = "SELECT balance FROM user_account WHERE user_id = $buyer_id;";
    $balance = mysqli_query($conn, $str);
    $b = mysqli_fetch_assoc($balance);
    $buyer_balance = $b['balance'];

    $str = "SELECT balance FROM user_account WHERE user_id = $seller_id;";
    $balance = mysqli_query($conn, $str);
    $b = mysqli_fetch_assoc($balance);
    $seller_balance = $b['balance'];
    
    if($current_buy_stock>0){
        if($buyer_balance>=$total_cost){
            $after_buy_stock = $current_buy_stock + $item_stock;
            $str = "UPDATE user_stocks SET quantity = $after_buy_stock WHERE user_id = $buyer_id AND company_id = $company_id;";
            mysqli_query($conn, $str);

            $after_sell_stock = $current_sell_stock - $item_stock;
            $str = "UPDATE user_stocks SET quantity = $after_sell_stock WHERE user_id = $seller_id AND company_id = $company_id;";
            mysqli_query($conn, $str);

            $buyer_balance = $buyer_balance - $total_cost;
            $str = "UPDATE user_account SET balance = $buyer_balance WHERE user_id = $buyer_id;";
            mysqli_query($conn, $str);

            $seller_balance = $seller_balance + $total_cost;
            $str = "UPDATE user_account SET balance = $seller_balance WHERE user_id = $seller_id;";
            mysqli_query($conn, $str);

            $str = "INSERT INTO trade(buyer_id, item_id, total_cost) VALUES($buyer_id, $item_id, $total_cost);";
            mysqli_query($conn, $str);


            $str = "UPDATE item SET is_active = 0 WHERE id = $item_id;";
            mysqli_query($conn, $str);
        }
    }else{
        if($buyer_balance>=$total_cost){
            $str = "INSERT INTO user_stocks(user_id, company_id, quantity)VALUES($buyer_id, $company_id, $item_stock);";
            mysqli_query($conn, $str);

            $after_sell_stock = $current_sell_stock - $item_stock;
            $str = "UPDATE user_stocks SET quantity = $after_sell_stock WHERE user_id = $seller_id AND company_id = $company_id;";
            mysqli_query($conn, $str);

            $buyer_balance = $buyer_balance - $total_cost;
            $str = "UPDATE user_account SET balance = $buyer_balance WHERE user_id = $buyer_id;";
            mysqli_query($conn, $str);

            $seller_balance = $seller_balance + $total_cost;
            $str = "UPDATE user_account SET balance = $seller_balance WHERE user_id = $seller_id;";
            mysqli_query($conn, $str);

            $str = "INSERT INTO trade(buyer_id, item_id, total_cost) VALUES($buyer_id, $item_id, $total_cost);";
            mysqli_query($conn, $str);

            $str = "UPDATE item SET is_active = 0 WHERE id = $item_id;";
            mysqli_query($conn, $str);
        }
    }

    header('location: item-list.php');

}



?>