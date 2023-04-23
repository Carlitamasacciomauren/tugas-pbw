<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../admin/css/indexs.css" rel="stylesheet">

    <!--Custom CSS-->
    <title>LOGIN</title>
    </head>
    <body>
        <div class="global-container">
            <div class="card login-form">
                <div class="card-body">
                    <h1 class="card-title text-center" >L O G I N</h1>
        </div>
        <div class="card-text">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">User</label>
                    <input type="text" class="form-control" id="username" aria-describedby="userHelp" name="username" required>
                    
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Password" name="password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success form-control mt-1" name="loginbtn">Login</button>
                </div>
                </form>
                </div>
                <div class="mt-3">
                    <?php
                        session_start();
                        include "koneksi.php";

                        $username="";
                        $password="";
                        if (isset($_POST["loginbtn"])){
                            $user=$_POST["username"];
                            $pass=$_POST["password"];
                            $sql="SELECT * FROM `admin` WHERE `username` = '$user' AND `password` = '$pass'";
                            $hasil=$koneksi->query($sql);
                            if ($rec=$hasil->fetch_assoc()) {
                                header("location:dashboard.php");
                            }else {
                                echo "<div style='text-align:center; color:red;'>*user tidak valid...</div>";
                            }
                        }
                    ?>
    </body>
</html>