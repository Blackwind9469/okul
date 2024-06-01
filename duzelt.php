<html>
    <body>
        <h1>Öğrenci Düzenle</h1>
        <?php 
        if( isset($_GET['id']) && !empty($_GET['id'])){
            require('connection.php');
            $id = $_GET['id'];

            if(isset($_POST['submit'])){
                $no = $_POST['no'];
                $ad = $_POST['ad'];
                $soyad = $_POST['soyad'];
                              
                if( !empty($no) && !empty($ad) && !empty($soyad)){                
                    $query = "UPDATE ogrenci SET no='$no', ad='$ad',soyad='$soyad' WHERE id=$id";
                    $result = mysqli_query($conn,$query);
                    if($result){
                        header("Location: index.php");
                    }
                    else{
                        echo "Hata !";
                    }                   
                }
                else{
                    echo "No - Ad - Soyad alanlarını boş bırakmayınız !";
                }
            }
            else{
                $query = "SELECT * FROM ogrenci WHERE id = $id";
                $result = mysqli_query($conn, $query);
                if($result){
                    $data = mysqli_fetch_assoc($result);
                ?>
                <form method="post" action="edit.php?id=<?php echo $data['id'] ?>">
                    <table>
                        <tr><td>No</td><td><input type="text" name="no" size="20" value="<?php echo $data['no']?>" /></td></tr>
                        <tr><td>Adı</td><td><input type="text" name="ad" size="20" value="<?php echo $data['ad']?>"/></td></tr>
                        <tr><td>Soyadı</td><td><input type="text" name="soyad" size="20" value="<?php echo $data['soyad']?>"/></td></tr>                    
                        <tr><td></td><td><input type="submit" name="submit" value="Güncelle"/></td></tr>
                    </table>
                </form>
                <?php              
                }
            }
            mysqli_close($conn);             
        }
        else{
            header("Location: index.php");
        }
        ?>
    </body>
</html>