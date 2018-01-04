<?php
session_start();
class UserDb{
    public function __construct()
    {
        try{
            $this->db=new PDO('mysql:host=localhost; dbname=coffee_db', 'root', '');
        }catch (PDOException $e){
            die("Connection failed to database.".$e);
        }
    }
    public function updateUserPassword($id, $password){
        $enc_password=sha1($password);
        $sql="update users set password='$enc_password' where id='$id'";
        $this->db->query($sql);
        header("location: ../manage-users.php");
    }
    public function changeToManager($id){
        $sql="update users set user_role='1' where id='$id'";
        $this->db->query($sql);
        header("location: ../manage-users.php");

    }
    public function changeToStandardUser($id){
        $sql="update users set user_role='2' where id='$id'";
        $this->db->query($sql);
        header("location: ../manage-users.php");

    }
    public function showUsers(){
        $sql="SELECT * FROM users";
        return $this->db->query($sql);
    }



    public function deleteUser($id){
        $sql="delete from users where id='$id'";
        $this->db->query($sql);
    }



    public function checkRole($userName){
        $sql="SELECT user_role from users where name='$userName'";
        return $this->db->query($sql);

    }





    public function changeUserPassword($old_password, $new_password, $confirm_new_password){
        $userName=$_SESSION['login@2017'];
        $sql="SELECT password from users where name='$userName'";
        $user=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        $db_old_password=$user['password'];
        $enc_old_password=sha1($old_password);
        if($db_old_password==$enc_old_password){
            if($new_password==$confirm_new_password){
                $enc_new_password=sha1($new_password);
                $pass_sql="update users set password='$enc_new_password' where name='$userName'";
                $this->db->query($pass_sql);
                $_SESSION['changePasswordSuccess']="The password have been successfully changed.";
                header("location: ../profile.php");



            }else{
                $_SESSION['changePassword']="The new password and confirm new password must match.";
                header("location: ../profile.php");
            }
        }else{
            $_SESSION['changePassword']="The selected old password is invalid.";
            header("location: ../profile.php");
        }



    }
    public function getProfile($userName){
        $sql="SELECT * FROM users where name='$userName'";
        return $this->db->query($sql);
    }








    public function loginUser($userName, $password){
        $sql="SELECT name, password from users where name='$userName'";
        $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        if($row['name']){
            $enc_password=sha1($password);
            if($enc_password==$row['password']){
                $_SESSION['login@2017']=$userName;
                header("location: ../dashboard.php");

            }else{
                $_SESSION['loginInfo']="The selected password is invalid.";
                header("location: ../../login.php");
            }


        }else{
            $_SESSION['loginInfo']="The selected user name was not found.";
            header("location: ../../login.php");
        }

    }






    public function regUser($userName, $email, $password, $confirm_password){
        $sql="select name from users where name='$userName'";
        $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

        if(!$row['name']){
            $mail_sql="select email from users where email='$email'";
            $mail_row=$this->db->query($mail_sql)->fetch(PDO::FETCH_ASSOC);
            if(!$mail_row['email']){

                if($password==$confirm_password){
                    $enc_password=sha1($password);

                    $insert="INSERT INTO users (name, email, password, user_role, created_at) values ('$userName', '$email', '$enc_password', '2', now())";
                    $this->db->query($insert);
                    $_SESSION['regSuccess']="The user account have been created successfully.";
                    header("location: ../../register.php");

                }else{
                    $_SESSION['regInfo']="The password and confirm password must match.";
                    header("location: ../../register.php");
                }

            }else{
                $_SESSION['regInfo']="The select email is already exists.";
                header("location: ../../register.php");
            }

        }else{
            $_SESSION['regInfo']="The select user name is already exists.";
            header("location: ../../register.php");
        }

    }
}