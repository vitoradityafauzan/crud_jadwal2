<?php
require_once("db.php");
if ($pdo_statement=$pdo_conn->prepare("delete from jobs where id=" . $_GET['id']);){
$pdo_statement->execute();
echo "Delete Succesful";
header('location:index.php');
}else {
	echo "Delete Unsuccesfull";
}
?>