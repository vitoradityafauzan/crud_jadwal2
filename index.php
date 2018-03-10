<?php
require_once("db.php");
?>
<html>
<head>
	<title>PHP PDO CRUD</title>
	<style>
		body{width:1200px;font-family:arial;letter-spacing:1px;line-height:20px;}
		.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
		.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
		.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
		.button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
	</style>
</head>

<body>
	<?php	
		$pdo_statement = $pdo_conn->prepare("SELECT * FROM jobs ORDER BY id DESC");
		$pdo_statement->execute();
		$result = $pdo_statement->fetchAll();
	?>
	<div style="text-align:right;margin:20px 0px;"><a href="add.php" class="button_link"><img src="crud-icon/add.png" title="Add New Record" style="vertical-align:bottom;" /> Create</a></div>

	<table class="tbl-qa">

	  <thead>
		<tr>
		  <th class="table-header" width="15%">Nomor</th>
		  <th class="table-header" width="20%">Tanggal</th>
		  <th class="table-header" width="20%">Store</th>
		  <th class="table-header" width="26%">Lokasi Store</th>
		  <th class="table-header" width="20%">Kategori</th>
		  <th class="table-header" width="35%">Keterangan</th>
		  <th class="table-header" width="5%">Actions</th>
		</tr>
	  </thead>

	  <tbody id="table-body">
		<?php
		if(!empty($result)) { 
			foreach($result as $row) {
		?>
		  <tr class="table-row">
			<td><?php echo $row["nomor"]; ?></td>
			<td><?php echo $row["tanggal"]; ?></td>
			<td><?php echo $row["store"]; ?></td>
			<td><?php echo $row["alamat"]; ?></td>
			<td><?php echo $row["kategori"]; ?></td>
			<td><?php echo $row["keterangan"]; ?></td>
			<td><a class="ajax-action-links" href='edit.php?id=<?php echo $row['id']; ?>'><img src="crud-icon/edit.png" title="Edit" /></a> <a class="ajax-action-links" href='delete.php?id=<?php echo $row['id']; ?>'><img src="crud-icon/delete.png" title="Delete" /></a></td>
		  </tr>
	    <?php
			}
		}
		?>
	  </tbody>

	</table>

</body>
</html>