<?php

    include("config.php");

    session_start();

    if (isset($_POST['login'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT username, password, type_id, kd_user FROM tb_user WHERE username = '$username'";

        $query = mysqli_query($db, $sql);

        if ($query->num_rows > 0)
        {
            while ($exec = mysqli_fetch_array($query)) {
                $haspassword = $exec['password'];
                $type_id = $exec['type_id'];
                $kd_user = $exec['kd_user'];

            
                if ($password == $haspassword) {
                        header('Location: home.php');

                        $_SESSION['id'] = $exec['kd_user'];
                        $_SESSION["loggedin"] = true;
                        $_SESSION['type_id'] = $type_id;
                    
                }
                else{
                    header('Location: index.php?status=failed');
                }
            
            }
        }
        else
        {
            header('Location: index.php?status=failed');
        }

    } else{

    }

 ?>
