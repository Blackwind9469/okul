<?php
if( isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    require('connection.php');
    $query = "DELETE FROM ogrenci WHERE id = $id";
    if(mysqli_query($conn,$query)){
        header("Location: index.php");
    }
    else{
        echo "Hata !";
    }
    mysqli_close($conn);
}
else{
    header("Location: index.php");
}
?>