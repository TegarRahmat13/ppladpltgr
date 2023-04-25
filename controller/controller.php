<?php
class Query
{
    private $conn;

    public function __construct()
    {
        $this -> conn = mysqli_connect("localhost", "root", "", "ppl");
    }

    public function checkuserdata()
    {
        // header("Location: ../agro/homeAgro.php");\
        // echo "login ditekan";
        $error = array();
        $email = $_POST['email'];
        $password =  md5($_POST['password']);
        if (!isset($email)) {
            // $error[] = 'You must enter a username';
            echo "<h3>alert('You must enter email')<h3>";
            echo "<script>alert('wrong password or email')</script>";
        }
        $query = "SELECT * FROM `pelakuagro` WHERE email = '$email' AND password = '$password' ";
        // $getstatus = "SELECT status FROM register_data where email = '$email' and password = '$password' and status='admin'";

        $hasil = $this->conn->query($query);
        // echo($hasil -> num_rows);
        // $hasil2 = $this->conn->query($getstatus);



        if (!isset($password) || (trim($password) == '')) {
            // $error[] = 'You must enter password';
            echo "<h3>alert('You must enter a password')<h3>";
        }
        // if($hasil -> num_rows > 0){
        //     header("Location: ../agro/homeAgro.php");
        // }
        if ($hasil->num_rows > 0) {
            $row = mysqli_fetch_assoc($hasil);
            $_SESSION['email'] = $row['email'];
            $_SESSION['id_agro'] = $row['id_agro'];
            $_SESSION['id_Agro'] = $row['id_Agro'];
            header("Location: ../agro/homeAgro.php");
        }
        // elseif ($hasil->num_rows > 0) {
        //     $row = mysqli_fetch_assoc($hasil);
        //     $_SESSION['email'] = $row['email'];
        //     $_SESSION['username'] = $row['username'];
        //     header("Location: view/userhomepage.php");
        // }
        else {
            echo "<script>alert('wrong password or email')</script>";
        }
    }

    public function logout()
    {
        echo "destroy session";
        session_destroy();
        header("Location: ../index.php");
    }

    public function register($name, $email, $pass, $cpass, $image, $image_size, $image_tmp_name, $image_folder)
    {
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);
        $pass = mysqli_real_escape_string($this->conn, md5($pass));
        $cpass = mysqli_real_escape_string($this->conn, md5($cpass));

        $select = mysqli_query($this->conn, "SELECT * FROM `pelakuagro` WHERE email = '$email' AND password = '$pass'") or die('query failed');

        if (mysqli_num_rows($select) > 0) {
            $message[] = 'user already exist';
        } else {
            if ($pass != $cpass) {
                $message[] = 'confirm password not matched!';
            } elseif ($image_size > 2000000) {
                $message[] = 'image size is too large!';
            } else {
                $insert = mysqli_query($this->conn, "INSERT INTO `pelakuagro`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

                if ($insert) {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'registered successfully!';
                    header('location:loginAgro.php');
                } else {
                    $message[] = 'registration failed!';
                }
            }
        }
        return $message;
    }

    public function updateProfile($user_id)
    {
        $update_name =  $_POST['update_name'];
        $update_email = $_POST['update_email'];
        $update_namausaha =$_POST['update_namausaha'];
        $update_deskripsi =$_POST['update_deskripsi'];
        echo "<script></script>";
        mysqli_query($this->conn, "UPDATE `pelakuagro` SET name = '$update_name', email = '$update_email', namausaha = '$update_namausaha', deskripsi = '$update_deskripsi' WHERE id_agro = '$user_id'") or die('query failed');

        $update_image = $_FILES['update_image']['name'];
        $update_image_size = $_FILES['update_image']['size'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_folder = $update_image;

        if (!empty($update_image)) {
            if ($update_image_size > 2000000) {
                echo "image is too large";
            //  $this->message[] = 'image is too large';
            } else {
                $image_update_query = mysqli_query($this->conn, "UPDATE `pelakuagro` SET image = '$update_image' WHERE id_agro = '$user_id'") or die('query failed');
                if ($image_update_query) {
                    move_uploaded_file($update_image_tmp_name, "../../upimage/". $update_image_folder);
                }
                header("Location: homeAgro.php");
                //  $this->message[] = 'image updated succssfully!';
            }
        }
    }


    public function checkmitradata()
    {
        $error = array();
        $email = $_POST['email'];
        $password =  md5($_POST['password']);
        if (!isset($email)) {
            echo "<h3>alert('You must enter email')<h3>";
            echo "<script>alert('wrong password or email')</script>";
        }
        $query = "SELECT * FROM `mitra` WHERE email = '$email' AND password = '$password' ";

        $hasil = $this->conn->query($query);

        if (!isset($password) || (trim($password) == '')) {
            echo "<h3>alert('You must enter a password')<h3>";
        }
        if ($hasil->num_rows > 0) {
            $row = mysqli_fetch_assoc($hasil);
            $_SESSION['email'] = $row['email'];
            $_SESSION['id_mitra'] = $row['id_mitra'];
            header("Location: ../mitrapage/mitra_home.php");
        } else {
            echo "<script>alert('wrong password or email')</script>";
        }
    }

    public function registermitra($name, $email, $pass, $cpass, $image, $image_size, $image_tmp_name, $image_folder)
    {
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);
        $pass = mysqli_real_escape_string($this->conn, md5($pass));
        $cpass = mysqli_real_escape_string($this->conn, md5($cpass));

        $select = mysqli_query($this->conn, "SELECT * FROM `mitra` WHERE email = '$email' AND password = '$pass'") or die('query failed');

        if (mysqli_num_rows($select) > 0) {
            $message[] = 'user already exist';
        } else {
            if ($pass != $cpass) {
                $message[] = 'confirm password not matched!';
            } elseif ($image_size > 2000000) {
                $message[] = 'image size is too large!';
            } else {
                $insert = mysqli_query($this->conn, "INSERT INTO `mitra`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

                if ($insert) {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'registered successfully!';
                    header('location:loginMitra.php');
                } else {
                    $message[] = 'registration failed!';
                }
            }
        }
        return $message;
    }



    public function checkadmindata()
    {
        $error = array();
        $email = $_POST['email'];
        $password =  md5($_POST['password']);
        if (!isset($email)) {
            echo "<h3>alert('You must enter email')<h3>";
            echo "<script>alert('wrong password or email')</script>";
        }
        $query = "SELECT * FROM `admin` WHERE email = '$email' AND password = '$password' ";

        $hasil = $this->conn->query($query);

        if (!isset($password) || (trim($password) == '')) {
            echo "<h3>alert('You must enter a password')<h3>";
        }
        if ($hasil->num_rows > 0) {
            $row = mysqli_fetch_assoc($hasil);
            $_SESSION['email'] = $row['email'];
            $_SESSION['id_admin'] = $row['id_admin'];
            $_SESSION['id_admin'] = $row['id_admin'];
            header("Location: ../admin/dashboardAdmin.php ");
        } else {
            echo "<script>alert('wrong password or email')</script>";
        }
    }
    public function registeradmin($name, $email, $pass, $cpass, $image, $image_size, $image_tmp_name, $image_folder)
    {
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);
        $pass = mysqli_real_escape_string($this->conn, md5($pass));
        $cpass = mysqli_real_escape_string($this->conn, md5($cpass));

        $select = mysqli_query($this->conn, "SELECT * FROM `admin` WHERE email = '$email' AND password = '$pass'") or die('query failed');

        if (mysqli_num_rows($select) > 0) {
            $message[] = 'user already exist';
        } else {
            if ($pass != $cpass) {
                $message[] = 'confirm password not matched!';
            } elseif ($image_size > 2000000) {
                $message[] = 'image size is too large!';
            } else {
                $insert = mysqli_query($this->conn, "INSERT INTO `admin`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

                if ($insert) {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'registered successfully!';
                    header('location:loginAdmin.php');
                } else {
                    $message[] = 'registration failed!';
                }
            }
        }
        return $message;
    }
    public function showform($id_form)
    {
        $query = "SELECT * FROM formulir where id_form = ".$id_form["id"];

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            die("Query Error : ".mysqli_errno($this->conn)." - ".mysqli_error($this->conn));
        }

        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

}
    
?>