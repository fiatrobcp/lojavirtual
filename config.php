<?php
//config.php (arquivo de conexao )

//informar servidor usuario e senha
$con = mysqli_connect("localhost","root","");

//dados do banco
$db = mysqli_select_db ($con,"lojavirtual");

//se nao conectar ou não achar o banco
if(! $con || !$db) echo mysql_error();

?>