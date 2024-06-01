<html>
<body>
    <?php
    require("connection.php");
    if (isset($_GET['id'])) 
    {
        $ogrenci_id = $_GET['id'];
        echo "$ogrenci_id";   
    }                           
        $cmd = "DELETE FROM ogrenci WHERE id = $ogrenci_id";
        if(mysqli_query($conn, $cmd))
        {
            echo "Kayıt başarıyla silindi.";
        }    
        else {
        echo "Geçersiz Talep.";
             }   
    ?>
    <p><a href="index.php">Öğrenci Listesi</a></p>
</body>
</html>
