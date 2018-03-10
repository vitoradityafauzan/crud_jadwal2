<?php
if(!empty($_POST["add_record"])) {
	require_once("db.php");
	$sql = "INSERT INTO jobs ( nomor, tanggal, store, alamat, kategori, keterangan ) VALUES ( :nomor, :tanggal, :store, :alamat, :kategori, :keterangan )";
	$pdo_statement = $pdo_conn->prepare( $sql );
		
	$result = $pdo_statement->execute( array( ':nomor'=>$_POST['nomor'], ':tanggal'=>$_POST['tanggal'], ':store'=>$_POST['store'], ':alamat'=>$_POST['alamat'], ':kategori'=>$_POST['kategori'], ':keterangan'=>$_POST['keterangan'] ) );
	if (!empty($result) ){
	  header('location:index.php');
	}
}
?>
<html>
<head>
	<title>PHP PDO CRUD - Add New Record</title>
	<style>
		body{width:615px;font-family:arial;letter-spacing:1px;line-height:20px;}
		.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
		.frm-add {border: #c3bebe 1px solid;
		    padding: 30px;}
		.demo-form-heading {margin-top:0px;font-weight: 500;}	
		.demo-form-row{margin-top:20px;}
		.demo-form-field{width:300px;padding:10px;}
		.demo-form-submit{color:#FFF;background-color:#414444;padding:10px 50px;border:0px;cursor:pointer;}
	</style>
</head>
<body>
	<div style="margin:20px 0px;text-align:right;"><a href="index.php" class="button_link">Back to List</a></div>

	<div class="frm-add">
		<h1 class="demo-form-heading">Add New Record</h1>
		
		<form name="frmAdd" action="" method="POST">
			  <div class="demo-form-row">
				  <label>Nomor: </label><br>
				  <input type="text" name="nomor" class="demo-form-field" required />
			  </div>
			   <div class="demo-form-row">
				  <label>Tanggal: </label><br>
				  <input type="date" name="tanggal" class="demo-form-field" required />
			  </div>
			   <div class="demo-form-row">
				  <label>Store: </label><br>
				  <input type="text" name="store" class="demo-form-field" required />
			  </div>
			  <div class="demo-form-row">
				  <label>Alamat: </label><br>
				  <textarea name="alamat" class="demo-form-field" rows="3" required ></textarea>
			  </div>
			   <div class="demo-form-row">
				  <label>Kategori: </label><br>
				  <input type="text" name="kategori" class="demo-form-field" required />
			  </div>
			   <div class="demo-form-row">
				  <label>Keterangan: </label><br>
				  <textarea name="keterangan" class="demo-form-field" rows="4" required ></textarea>
			  </div>

			  <div class="demo-form-row">
				  <input name="add_record" type="submit" value="Add" class="demo-form-submit">
			  </div>
		  </form>
	</div> 
</body>
</html>