<?php
$db1_name = "";
$db2_name = "";
if(isset($_POST["compare"])){


require("dbSync.php");

$db1_name = $_POST["db1_name"];
$db2_name = $_POST["db2_name"];


        $db1 = [
            'host' => 'localhost',
            'dbname' => $_POST["db1_name"],
              'username' => 'root',
            'password' => ''
        ];

        $db2 = [
            'host' => 'localhost',
            'dbname' => $_POST["db2_name"],
            'username' => 'root',
            'password' => ''
        ];



$type = $_POST["type"];
$remove_table = $_POST["remove_table"];
$remove_column = $_POST["remove_column"];




        $sync = new Dbsync($db1, $db2, true, $remove_table == 1 ? true : false ,$remove_column == 1 ? true : false);

        $result = $sync->compare();


if($result){
     if($type == 1){

        echo "<pre>";
        echo var_dump($sync->getSql());
        echo "</pre>";

        }else{

            $sync->execute();

        } 
    }
      
    



}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Db Sync</title>
</head>
<body>
<hr>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type="hidden" name="compare" value="ok"/>

Veritabanı 1 Adı:<br>
<input type="text" name="db1_name" value="<?php echo $db1_name; ?>"/ ><br>

Veritabanı 2 Adı:<br>
<input type="text" name="db2_name" value="<?php echo $db2_name; ?>" / ><br>
<br>
İşlem:<br>
<select name="type">
	<option value="1">Hesapla</option>
	<option value="2">Uygula</option>
</select>

Tablo Silme:<br>
<select name="remove_table">
	<option value="1">Sil!</option>
	<option value="2">Silme</option>
</select>

<br>

Tablo Silme:<br>
<select name="remove_column">
	<option value="1">Sil!</option>
	<option value="2">Silme</option>
</select>



<br><input type="submit" name="Gönder">

</form>

</body>
</html>