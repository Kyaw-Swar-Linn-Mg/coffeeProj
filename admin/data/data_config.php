<?php
class DataDb{
    public function __construct()
    {
        try {
            $this->db=new PDO('mysql:host=127.0.0.1;dbname=coffee_db','root', '');
        }catch (PDOException $e){
            die ("Connection Failed to Database." .$e);
        }
    }




    public function insertCat($cat_name){
        $sql="insert into data_category (category_name) values ('$cat_name')";
        $this->db->query($sql);
        header("location: ../category.php");
    }
    public function showCat(){
        $sql="select * from data_category";
        return $this->db->query($sql);
    }
    public function deleteCat($cat_name){
        $sql="delete from data_category where category_name='$cat_name'";
        $this->db->query($sql);
        header("location: ../category.php");
    }






    public function insertData($data_name, $price, $cat_id, $data_image){
        $sql="insert into main_data (data_name, price, cat_id, data_image) 
            values ('$data_name', '$price', '$cat_id','$data_name')";
        $this->db->query($sql);
        if($data_image) {
            move_uploaded_file($data_image, "images/$data_name");
        }
        header("location: ../dashboard.php");


    }
    public function showData(){
        $sql="SELECT * from main_data ORDER  by id DESC ";
        return $this->db->query($sql);
    }
}
