<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $username = $_['user'];
        $password = $_['pass'];

        $sql= "select * from login where useername='$username' and password = '$password' and email='$email'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);   
        if($count==1){
            header("location: welcome.php");
        }
        else{
            echo '<script>
                window.location.href="kuch.html"
                alert("login failed invalid username or password")
            </script>'    
        }
    }
?>