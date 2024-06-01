<html>
    <body>
        <h1>Öğrenci Ekle</h1>
        <?php
        if(isset($_POST['submit'])){
            $no = $_POST['no'];
            $ad = $_POST['ad'];
            $soyad = $_POST['soyad'];
            $tel = "0-".$_POST['pre']."-".$_POST['tel'];
            $mail = $_POST['mail'];
            $cinsiyet = $_POST['cinsiyet'];
            
            if( !empty($no) && !empty($ad) && !empty($soyad)){
                require("connection.php");                
                $query = "INSERT INTO ogrenci VALUES(null, '$no','$ad','$soyad','$tel','$mail','$cinsiyet')";
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
                <tr><td>Telefonu</td><td><input type="text" name="pre" minlength="3" maxlength="3" size="4"/>
                                        <input type="text" name="tel" minlength="7" maxlength="7" size="10"/></td></tr>
                <tr><td>E-Mail</td><td><input type="text" name="mail" size="20"/></td></tr>
                <tr><td>Cinsiyeti</td><td><input type="radio" id="erkek" name="cinsiyet" value="erkek" checked>
                                            <label for="erkek">Erkek</label>
                                            <input type="radio" id="kadin" name="cinsiyet" value="kadin">
                                            <label for="kadin">Kadın</label></td></tr>
                <tr><td></td><td><input type="submit" name="submit" value="Ekle"/></td></tr>
            </table>
        </form>
    </body>
</html>