<?php
$conn = mysqli_connect("127.0.0.1","root","","okul");
if(mysqli_connect_errno()){
    echo "MYSQL: Bağlantı hatası ". mysqli_connect_error();
    exit();
}
?>
