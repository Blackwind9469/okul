<html>
    <body>
        <h1>Öğrenci Ekle</h1>
        <?php
        if(isset($_POST['submit'])){
            $no = $_POST['no'];
            $ad = $_POST['ad'];
            $soyad = $_POST['soyad'];
            
            
            if( !empty($no) && !empty($ad) && !empty($soyad)){
                require("connection.php");                
                $query = "INSERT INTO ogrenci VALUES(null, '$no','$ad','$soyad')";
                $result = mysqli_query($conn,$query);
                if($result){
                    header("Location: index.php");
                }
                else{
                    echo "Hata !";
                }
                mysqli_close($conn);
            }
            else{
                echo "No - Ad - Soyad alanlarını boş bırakmayınız !";
            }
        }
        ?>        
        <form method="post" action="add.php">
            <table>
                <tr><td>No</td><td><input type="text" name="no" size="20"/></td></tr>
                <tr><td>Adı</td><td><input type="text" name="ad" size="20"/></td></tr>
                <tr><td>Soyadı</td><td><input type="text" name="soyad" size="20"/></td></tr>
                
                <tr><td></td><td><input type="submit" name="submit" value="Ekle"/></td></tr>
            </table>
        </form>
    </body>
</html>