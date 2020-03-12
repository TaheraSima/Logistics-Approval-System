<?php

	include 'config/conn.php';
	$searchTerm = mysqli_real_escape_string($conn, $_POST["keyword"]);
	$sql = "SELECT * FROM  `projects_info` WHERE `name` LIKE '%".$searchTerm."%' AND `status`=1";
	if ($searchTerm) {
	$result=mysqli_query($conn,$sql);
	$item_data = '<ul id="item-list" style="box-sizing: border-box; list-style: decimal;">';
	if(mysqli_num_rows($result) > 0){ 
		$item_data .='<center><b style="color:red; margin-top:15px;">Existing items list</b></center>';
	    while($row = mysqli_fetch_assoc($result)){
	    	$item = $row["name"];
	        $item_data .='<li>'.$item.'</li>';
	    }
	}
	$item_data .='</ul>';
	 
	echo $item_data;
	}

?>
