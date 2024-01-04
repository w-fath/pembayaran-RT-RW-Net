<?php
    if (isset($_POST['submit'])){
        $name       =$_POST['name'];
        $email      =$_POST['email'];
        $massage    =$_POST['massage'];
        $no_wa      =$_POST['noWa'];
        header("location:https://api.whatsapp.com/send?phone=$no_wa&text=*Nama:*%20$name%20%0A*Email:*%20$email%20%0A*Pesan:*%20$massage");
    }else{
        echo"
            <script>
            window.location=history.go(-1);
            </script>
        ";
    }
?>