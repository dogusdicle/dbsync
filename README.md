# dbsync
İki veritabanı arasında yapıları senkronize eder.

#Kullanım:


<?php \n
require("dbSync.php");\n



$db1 = [
            'host' => 'localhost',
            'dbname' => 'test1',
            'username' => 'root',
            'password' => ''
        ];
$db2 = [
            'host' => 'localhost',
            'dbname' => 'test2',
            'username' => 'root',
            'password' => ''
        ];

$sync = new Dbsync($db1, $db2, true,true,true);\n


$result = $sync->compare();\n


if($result == 1){\n


   $sync->execute();\n
   
   
}else{\n


  echo "İki veritabanı Tablo ve tablo yapıları birbiri ile aynı";\n
 
 
}\n


?>\n



İki veritabanını compare() methodu ile karşılaştırıyoruz
eğer fark yoksa 0 fark var ise 1 döndürür


execute()
Eğer 2. veritabanı nın tablo ve tablo sütunlarını 1. veritabanı ile eşitlemek istersek
execute() ile sorguyu tamamlayabiliriz

