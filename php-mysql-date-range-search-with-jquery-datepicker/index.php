<?php
	$conn = mysqli_connect("localhost", "root", "", "crud");
	
	$tanggal = "";
	$tanggal2 = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$tanggal = $_POST["search"]["tanggal"];
		list($fid,$fim,$fiy) = explode("-",$tanggal);
		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["tanggal2"])) {
			$tanggal2 = $_POST["search"]["tanggal2"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["tanggal2"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
		
		$queryCondition .= "WHERE tanggal BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";
	}

	$sql = "SELECT * from jobs " . $queryCondition . " ORDER BY tanggal desc";
	$result = mysqli_query($conn,$sql);
?>

<html>
	<head>
    <title>Recent Articles</title>		
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
	.table-content{border-top:#CCCCCC 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	</style>
	</head>
	
	<body>
    <div class="demo-content">
		<h2 class="title_with_link">Recent Articles</h2>
  <form name="frmSearch" method="post" action="">
	 <p class="search_input">
		<input type="text" placeholder="From Date" id="tanggal" name="search[tanggal]"  value="<?php echo $tanggal; ?>" class="input-control" />
	    <input type="text" placeholder="To Date" id="tanggal2" name="search[tanggal2]" style="margin-left:10px"  value="<?php echo $tanggal2; ?>" class="input-control"  />			 
		<input type="submit" name="go" value="Search" >
	</p>
<?php if(!empty($result))	 { ?>
<table class="table-content">
          <thead>
        <tr>
                      
          <th width="30%"><span>Post Title</span></th>
          <th width="50%"><span>Description</span></th>          
          <th width="20%"><span>Post Date</span></th>	  
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
        <tr>
			<td><?php echo $row["kategori"]; ?></td>
			<td><?php echo $row["keterangan"]; ?></td>
			<td><?php echo $row["tanggal"]; ?></td>

		</tr>
   <?php
		}
   ?>
   <tbody>
  </table>
<?php } ?>
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
buttonImage: "datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#tanggal").datepicker();
$("#tanggal2").datepicker();
});
</script>
</body></html>
