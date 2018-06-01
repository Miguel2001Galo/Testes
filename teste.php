<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$Nome = $Idade = $Morada = $Salario = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Nome = test_input($_POST["Nome"]);
  $Idade = test_input($_POST["Idade"]);
  $Morada = test_input($_POST["Morada"]);
  $Salario = test_input($_POST["Salario"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Criação de dados</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nome: <input type="text" name="Nome">
  <br><br>
  Idade: <input type="text" name="Idade">
  <br><br>
  Morada <input type="text" name="Morada">
  <br><br>
  Salario <input type="text" name="Salario">
  <br><br>

  <form action="" method="post">
     <input type="submit" value="Clicar" name="botao">
</form>  
</form>

<?php

      
if(isset($_POST["botao"])){

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
       INSERT INTO testes (NAME,AGE,ADDRESS,SALARY)
      VALUES ('$Nome', '$Idade', '$Morada', '$Salario' );
EOF;
     

   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
}

?>

</body>
</html>