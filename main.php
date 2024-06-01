<html>
    <body>
        <h1>Öğrenci Listesi</h1>
        <?php
        require("connection.php");
        $query = "SELECT * FROM ogrenci";
        if($data = mysqli_query($conn, $query)){
            $count = mysqli_num_rows($data);
            if($count > 0){
                echo "<p>Kayıt Sayısı : $count</p>";
                echo "<table border=1 cellpadding=10>";
                echo "<tr><th>No</th><th>Ad</th><th>Soyad</th><th>İşlem</th></tr>";
                while($satir = mysqli_fetch_assoc($data)){
                    echo "<tr>";
                    echo "<td>".$satir['no']."</td><td>".$satir['ad']."</td><td>".$satir['soyad']."</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id={$satir["id"]}'>Düzenle</a> ||"; 
                    ?>
                    <a href="delete.php?id=<?php echo $satir["id"]?>" onclick="return confirm('Emin misiniz?')">Sil</a>
                    <?php
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "Kayıt bulunamadı";
            }
            echo "<p><a href='add.php'>Ekle</a></p>";
            mysqli_free_result($data);
        }
        else{
            echo "Sorgu hatası";
        }
        mysqli_close($conn);
        ?>
    </body>
</html>