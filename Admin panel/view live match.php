<?php
	require('Admin connect.php');
	
	$result= mysql_query("select * from livematches order by match_id desc") or die ('could not select'.mysql_error());
	$count= 0;
	while($row = mysql_fetch_array($result,MYSQL_ASSOC))
	{
		$id[]= $row['match_id'];
		$league_name[]= $row['leaguename'];
		$hometeam[]= $row['hometeam'];
		$awayteam[]= $row['awayteam'];
		$count ++;
	 }
	 // to delete from database
	 if(isset($_GET['match_id']))// if it is ok get the ID in the database
	 {
		 $delete=$_GET['match_id'];
		 
		 $del_query=mysql_query("delete from livematches where match_id='$delete'") or die (''.mysql_error());
		 while($row= mysql_fetch_array($del_query,MYSQL_ASSOC)) 
		 {
		 	$del_id=$row['match_id'];
			$home=$row['hometeam'];
			$away=$row['awayteam'];
					 
		 }
		
			
	}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View live match</title>
<link href="css/adminupload.css" rel="stylesheet" type="text/css" />
<style type="text/css">
a:link {
	color: #333;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
	color: #278B47;
}
a:active {
	text-decoration: none;
}
</style>
</head>

<body bgcolor="#333333">
<div class="wrapper">
<form action="" method="post" enctype="multipart/form-data">
<div class="banner">
<div class="logo_box"><img src="../images/alabi logo.png" width="260" height="63" /></div>
</div>
<div class="left">
<div class="cont_box"><a href="category.php">Select Sports Category</a></div>
<div class="cont_box"><a href="league name.php">Select League Name</a></div>
<div class="cont_box"><a href="country.php">Select Country</a></div>
<div class="cont_box"><a href="Upload live matches.php">Upload Live Match</a></div>
<div class="cont_box"><a href="upload upcoming events.php">Upload Upcoming Events</a></div>
<div class="cont_box"><a href="View reg users.php">View Registered Users</a></div>
<div class="cont_box"><a href="view live match.php">View Live Match</a></div>
<div class="cont_box"><a href="#">Select Sports Category</a></div>
<div class="cont_box"><a href="#">Select Sports Category</a></div>
<div class="cont_box"><a href="#">Select Sports Category</a></div>

</div>

<div class="right">
  <div class="category">
<table width="742" cellpadding="5" cellspacing="5">
  <tr>
    <td width="69" bgcolor="#C61C1C">Match_id</td>
    <td width="185" bgcolor="#C61C1C">League Name</td>
    <td width="120" bgcolor="#C61C1C">Hometeam</td>
    <td width="128" bgcolor="#C61C1C">Away team</td>
    <td width="40" bgcolor="#C61C1C">Edit</td>
    <td width="47" bgcolor="#C61C1C">View</td>
    <td width="47" bgcolor="#C61C1C">Delete</td>
  </tr>
  <?php for( $a=0; $a<$count; $a++) {?>
  <tr>
    <td bgcolor="#278B47"><?php echo $id[$a]?></td>
    <td bgcolor="#FFFFFF"><?php echo $league_name[$a]?></td>
    <td bgcolor="#FFFFFF"><?php echo $hometeam[$a]?></td>
    <td bgcolor="#FFFFFF"><?php echo $awayteam[$a] ?></td>
    <td bgcolor="#CCCCCC"><a href="Edit live match.php?match_id=<?php echo $id[$a]?>">Edit</a></td>
    <td bgcolor="#CCCCCC"><a href="blank.php?match_id=<?php echo $id[$a]?>">View</a></td>
    <td bgcolor="#CCCCCC"><a href="view live match.php?match_id=<?php echo $id[$a]?>">Delete</a></td>
    </tr>
    <?php ;}?>
</table>

  </div>
</div>
</form>.

</div>
</body>
</html>