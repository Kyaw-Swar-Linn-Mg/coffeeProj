<?php
session_start();
class SecondDb
{
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=coffee_db', 'root', '');
        } catch (PDOException $e) {
            die ("Connection Failed to Database." . $e);
        }
    }







    public function showDataForPublic($category, $q){
        if($q){
            $sql="select * from main_data where data_name LIKE '%".$q."%' ";
        }else{
            if ($category) {
                $sql = "SELECT * FROM main_data where cat_id='$category' ORDER BY  id DESC ";

            } else {
                $sql = "SELECT * FROM main_data ORDER by id DESC ";
            }
        }

        return $this->db->query($sql);
    }




    public function showCatForPublic(){
        $sql="SELECT * FROM data_category";
        return $this->db->query($sql);
    }
















    public function cart($id){
        $sql="select * from main_data where id='$id'";
        return $this->db->query($sql);
    }

    public function checkOut( $table_number){
        $sql="INSERT INTO check_out (table_number, cash_status, created_at) values ('$table_number','0', now())";
        $this->db->query($sql);
        $checkout_id=$this->db->lastInsertId();

        foreach ($_SESSION['cart'] as $id=>$qty):
            $db_sql="select * from main_data where id='$id'";
            $db_sql_result=$this->db->query($db_sql);
            $row=$db_sql_result->fetch(PDO::FETCH_ASSOC);
            $order_name=$row['data_name'];
            $order_price=$row['price'];


            $insertSql="INSERT INTO orders(order_name, price, quantity, checkout_id,created_at) values ('$order_name', '$order_price', '$qty', '$checkout_id', now())";
            $this->db->query($insertSql);


        endforeach;

        unset($_SESSION['cart']);

        header("location: ../admin/cart.php");

    }






    public function showChechout(){
        $sql="SELECT * FROM check_out ORDER BY id DESC ";
        return $this->db->query($sql);
    }
    public function showOrders($checkout_id){
        $sql="select * from orders where checkout_id='$checkout_id'";
        return $this->db->query($sql);
    }

    public function showCheckOutForCash($id){
        $sql="SELECT * FROM check_out where id='$id'";
        return $this->db->query($sql);
    }

    public function changeCashStatus($id){
        $sql="UPDATE check_out set cash_status='1' where id='$id'";
        return $this->db->query($sql);
    }




}