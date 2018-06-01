<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('galp.db');
      }
   }
   
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
   }

   $sql =<<<EOF
      SELECT * from testes;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<br>ID = ". $row['ID'] . "\n";
      echo "<br>Nome = ". $row['NAME'] ."\n";
      echo "<br>Morada  = ". $row['ADDRESS'] ."\n";
      echo "<br>Salario = ".$row['SALARY'] ."<br>\n\n";
   }
   $db->close();
?>