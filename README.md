# dbsync
İki veritabanı arasında yapıları senkronize eder.

#Kullanım:

```php
require("dbSync.php");
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

$sync = new Dbsync($db1, $db2, true,true,true);

/*
*  public function __construct($one_db_data, $two_db_data, $data_sync = false, $remove_table = false, $remove_column = false)
* 
*  $data_sync = yapılar haricinde verileri de aktarmak istersek true yapacağız
*  $remove_table = 2. veritabanında olan tablo 1. veritabanında yok ise kaldır (DROP TABLE xxx)
*  $remove_column =  2. veritabanında olan tablonun sütunu 1. veritabanında yok ise kaldır (ALTER TABLE {tablo} DROP COLUMN {sütun} )
*/

$result = $sync->compare();

/*
* İki veritabanını compare() methodu ile karşılaştırıyoruz
* eğer fark yoksa 0 fark var ise 1 döndürür
*/

if($result == 1){

            /*
            * AMACIMIZ DEĞİŞLİKLERİ DÜZELTMEK İSE
            * execute()
            * Eğer 2. veritabanı nın tablo ve tablo sütunlarını 1. veritabanı ile eşitlemek istersek
            * execute() ile sorguyu tamamlayabiliriz
            */
            $sync->execute();

            //EĞER AMACIMIZ YANLIZCA FARKLARI GÖRMEK İSE

            $sync->getCompareReport();

            //yada

            $sqlArray = $sync->getSqlArray();

            //yada

            echo $sync->printSql();
   
  
}else{

  echo "İki veritabanı Tablo ve tablo yapıları birbiri ile aynı";
  
}



```
#DİKKAT!!!

* Bu uygulama veri kaybına yada hatalı sonuçlara neden olabilir!

* Tamamen eğitim amaçlıdır hiçbir garanti verilmez yada herhangi bir sorumluluk kabul etmemekteyiz!

* Eğer kullanmak istiyorsanız kendi testlerinizi yapıp doğruluğundan emin olduktan sonra kullanın!

* Kullanmadan önce mutlaka 2 veritabanında yedeğini alın!

