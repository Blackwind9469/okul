<html>
    <body>
        <h1>Öğrenci Kaydı Düzenle</h1>
        <?php
        $ogrenci_id = $_GET['id'];
        if(isset($_POST['submit'])){
            $no = $_POST['no'];
            $ad = $_POST['ad'];
            $soyad = $_POST['soyad'];
            $tel = "0-".$_POST['pre']."-".$_POST['tel'];
            $mail = $_POST['mail'];
            $cinsiyet = $_POST['cinsiyet'];
            
            if( !empty($no) && !empty($ad) && !empty($soyad)){
                require("connection.php");                
                $query = "update ogrenci set no='$no', ad='$ad', soyad='$soyad', tel='$tel', mail='$mail', cinsiyet='$cinsiyet' where id=$ogrenci_id";
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
        require("connection.php");
        $query = "select * from ogrenci where id=$ogrenci_id";
        $data = mysqli_query($conn, $query);
        $satir = mysqli_fetch_assoc($data);
        ?>        
        <form method="post" action="edit.php?id=<?= $ogrenci_id ?>">
            <table>
                <tr><td>No</td><td><input type="text" name="no" value="<?= $satir['no'] ?>" size="20"/></td></tr>
                <tr><td>Adı</td><td><input type="text" name="ad" value="<?= $satir['ad'] ?>" size="20"/></td></tr>
                <tr><td>Soyadı</td><td><input type="text" name="soyad" value="<?= $satir['soyad'] ?>" size="20"/></td></tr>
                <tr><td>Telefonu</td><td><input type="text" name="pre" minlength="3" maxlength="3" size="4"/>
                                        <input type="text" name="tel" minlength="7" maxlength="7" size="10"/></td></tr>
                <tr><td>E-Mail</td><td><input type="text" name="mail" value="<?= $satir['mail'] ?>" size="20"/></td></tr>
                <tr><td>Cinsiyeti</td><td><input type="radio" id="erkek" name="cinsiyet" value="erkek" checked>
                                            <label for="erkek">Erkek</label>
                                            <input type="radio" id="kadin" name="cinsiyet" value="kadin">
                                            <label for="kadin">Kadın</label></td></tr>
                <tr><td></td><td><input type="submit" name="submit" value="Düzelt"/></td><td></td></tr>
            </table>
        </form>
        <form action="index.php">
        <input type="submit" name="cancel" value="İptal"/></form>
    </body>
</html>