<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	// if user is logged in
	if( isset($_SESSION['user']) ) {

		// handle delete request
		$deleteId = mysql_real_escape_string($_GET['delId']);
		if ($deleteId !== undefined){
			$delete_request = mysql_query('DELETE FROM announcements WHERE announceId='.$deleteId);
		}

		// select logged in users detail
		$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
		$userRow=mysql_fetch_array($res);

		// exec emails with posting privleges
		$exec = false;
		if ($userRow["userEmail"] == "amy.kim162@gmail.com" || $userRow["userEmail"] == "jessica.meng0402@gmail.com" || $userRow["userEmail"] == "fisherji@hdsb.ca" || $userRow["userEmail"] == "1ibrahimirfan@gmail.com"){
			$exec = true;
		}
		if ($userRow["userEmail"] == "fisherji@hdsb.ca"){
			$exec = true;
			$admin = true;
		}

	}


?>

<!--
/$$$$$$ /$$$$$$$  /$$$$$$$   /$$$$$$  /$$   /$$ /$$$$$$ /$$      /$$       /$$$$$$ /$$$$$$$  /$$$$$$$$ /$$$$$$  /$$   /$$
|_  $$_/| $$__  $$| $$__  $$ /$$__  $$| $$  | $$|_  $$_/| $$$    /$$$      |_  $$_/| $$__  $$| $$_____//$$__  $$| $$$ | $$
 | $$  | $$  \ $$| $$  \ $$| $$  \ $$| $$  | $$  | $$  | $$$$  /$$$$        | $$  | $$  \ $$| $$     | $$  \ $$| $$$$| $$
 | $$  | $$$$$$$ | $$$$$$$/| $$$$$$$$| $$$$$$$$  | $$  | $$ $$/$$ $$        | $$  | $$$$$$$/| $$$$$  | $$$$$$$$| $$ $$ $$
 | $$  | $$__  $$| $$__  $$| $$__  $$| $$__  $$  | $$  | $$  $$$| $$        | $$  | $$__  $$| $$__/  | $$__  $$| $$  $$$$
 | $$  | $$  \ $$| $$  \ $$| $$  | $$| $$  | $$  | $$  | $$\  $ | $$        | $$  | $$  \ $$| $$     | $$  | $$| $$\  $$$
/$$$$$$| $$$$$$$/| $$  | $$| $$  | $$| $$  | $$ /$$$$$$| $$ \/  | $$       /$$$$$$| $$  | $$| $$     | $$  | $$| $$ \  $$
|______/|_______/ |__/  |__/|__/  |__/|__/  |__/|______/|__/     |__/      |______/|__/  |__/|__/     |__/  |__/|__/  \__/



/$$$$$$ /$$$$$$$  /$$   /$$  /$$$$$$        /$$$$$$$  /$$$$$$$$  /$$$$$$   /$$$$$$
|_  $$_/| $$__  $$| $$  | $$ /$$__  $$      | $$__  $$| $$_____/ /$$__  $$ /$$__  $$
 | $$  | $$  \ $$| $$  | $$| $$  \__/      | $$  \ $$| $$      | $$  \__/| $$  \ $$
 | $$  | $$$$$$$/| $$$$$$$$|  $$$$$$       | $$  | $$| $$$$$   | $$      | $$$$$$$$
 | $$  | $$__  $$| $$__  $$ \____  $$      | $$  | $$| $$__/   | $$      | $$__  $$
 | $$  | $$  \ $$| $$  | $$ /$$  \ $$      | $$  | $$| $$      | $$    $$| $$  | $$
/$$$$$$| $$  | $$| $$  | $$|  $$$$$$/      | $$$$$$$/| $$$$$$$$|  $$$$$$/| $$  | $$
|______/|__/  |__/|__/  |__/ \______/       |_______/ |________/ \______/ |__/  |__/


-->

<html>

<head>
<title> IRHS DECA </title>

<link rel="icon" href="img/favicon.ico" sizes="16x16">
<!-- Add jQuery library -->
<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/cssmenu/styles.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-red.min.css">

<link rel="stylesheet" type="text/css" href="css/main.css"></link>

</head>

<body>

  <div id="wrapper">
	
  <!-- Mobile menu -->
  <div id="mobile_menu">
	<img id="menu-logo" src="img/logo2.png" height="40" align="left">
	<img id="menu-bars" src="img/menu_bars.png" height="32" align="right">
  </div>

  <!-- Mobile dropdown -->
  <ul id="mobile_dropdown" style="display: none;">
	  <li><a href='index.php'><span>Home</span></a></li>
	  <li class="active"><a href='about.php'><span>About DECA</span></a></li>
	  <li><a href='events.php'><span>Events</span></a></li>
	  <li><a href='dashboard.php'><span>Dashboard</span></a></li>
	  <li><a href='announcements.php'><span>Announcements</span></a></li>
	  <li><a href='dates.php'><span>Schedules</span></a></li>
	  
	  <!-- show menu based on user login -->
	  <?php if( !isset($_SESSION['user']) ) { ?>
		 <li><a href='register.php'><span>Register</span></a></li>
		 <li class='last'><a href='login.php'><span>Login</span></a></li>
		 <?php } else { ?>
			<li><a href='exams.php'><span>Exams</span></a></li>
		   <li class='last'><a href='logout.php?logout'><span>Logout</span></a></li>
		<?php
		}
		?>
  </ul>


	<!-- Desktop menu -->
  <div id='cssmenu'>
	  <ul>
		  <li><a href='index.php'><span>Home</span></a></li>
		  <li><a href='about.php'><span>About DECA</span></a></li>
		  <li><a href='events.php'><span>Events</span></a></li>
		  <li><a href='dashboard.php'><span>Dashboard</span></a></li>
		  <li class="active"><a href='announcements.php'><span>Announcements</span></a></li>
		  <li><a href='dates.php'><span>Schedules</span></a></li>
		  
		  <?php if( !isset($_SESSION['user']) ) { ?>
			 <li><a href='register.php'><span>Register</span></a></li>
			 <li class='last'><a href='login.php'><span>Login</span></a></li>
			 <?php } else { ?>
				<li><a href='exams.php'><span>Exams</span></a></li>
			   <li class='last'><a href='logout.php?logout'><span>Logout</span></a></li>
		<?php
			}
		?>
	  </ul>
  </div>
	  </br>

	  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	  <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
	  <script type="text/javascript" src="js/menu.js"></script>

<?php
	// handle announcment post request
	if(isset($_POST['submit'])) {
		$title = mysql_real_escape_string(strip_tags(trim($_POST['title'])));
		$body = mysql_real_escape_string(strip_tags(trim($_POST['body'])));

		// error check
		$error = false;
		if (empty($title) || empty($body)){
			$error = true;
			$msg = "You must complete all fields.";
		}

		if (!$error){
			// sanitize the quotations and insert to db
			$new_body = str_replace("'", "''", "$body");
			$new_body = str_replace("\n", "", "$new_body");
			$query = "INSERT INTO announcements(title, body, cluster) VALUES('$title', '$new_body', 'Chapter')";
			$res = mysql_query($query);
		}
	} 
?>
	
<div class="content">
<h4>Chapter Wide Announcements</h4>

<!-- If exec, show post form -->
<?php if ($exec) {  ?>
		<h5 style="color: red;"><?php echo $msg ?></h5>
		<form id="post_announcements" method="post">
			  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				  <input class="mdl-textfield__input" type="text" id="title" name="title">
				  <label class="mdl-textfield__label" for="title">Title</label>
			  </div>
			  </br>
			  </br>
			  <div class="mdl-textfield mdl-js-textfield">
			   <textarea class="mdl-textfield__input" type="text" rows="3" id="body" name="body"></textarea>
			   <label class="mdl-textfield__label" for="body">Body</label>
			</div>
			  <input id="submit_ann" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="submit" value="Post">
			  </input>
		</form>
<?php
	}
	$res_cm = mysql_query("SELECT * FROM announcements WHERE cluster='Chapter'");

	while ($ann = mysql_fetch_array($res_cm, MYSQL_ASSOC)) {
		$data[] = $ann;
	}
	$data = array_reverse($data,true);

	foreach ($data as $announcement){
?>
	<div class="announce wordwrap">
		<!-- Show announcement with delete option if exec -->	
		<?php if ($exec) { ?>
			<img class="delete_ann" src="img/x.png" onClick="self.location='http://www.irhsdeca.xyz/announcements.php?delId=<?php echo $announcement['announceId']; ?>'">
		<?php } ?>
		<h4 id="ann-title"><?php echo $announcement["title"]; ?></h4>
		<h5 id="ann-body"><?php echo $announcement["body"]; ?></h5>
		<h6 id="ann-date"><?php echo $announcement["datePosted"]; ?></h6>
	</div>

<?php
	}
	mysql_free_result($res_cm);

	// if admin, show all cluster announcements too
	if ($admin){
?>
		<h4>All Cluster Annoucnements</h4>
<?php
		$res_cm2 = mysql_query("SELECT * FROM announcements WHERE NOT cluster='Chapter'");

		while ($ann2 = mysql_fetch_array($res_cm2, MYSQL_ASSOC)) {
			$data2[] = $ann2;
		}
		$data2 = array_reverse($data2,true);

		foreach ($data2 as $announcement2){
?>
			<div class="announce wordwrap">
				<h4 id="ann-title"><?php echo $announcement2["title"]; echo " (Cluster: "; echo $announcement2["cluster"]; echo ")"; ?></h4>
				<h5 id="ann-body"><?php echo $announcement2["body"]; ?></h5>
				<h6 id="ann-date"><?php echo $announcement2["datePosted"]; ?></h6>
			</div>
<?php
		}
		mysql_free_result($res_cm2);

	}
?>

	</div>

	<!-- Footer -->
	<div class="footer">
	  <img id="altlogo" src="img/logo_alt.png" align="left"/>
	  <img id="fbimg" src="img/facebook-box.png" align="right"/>
	<h6><a href="http://www.ibrahimirfan.com" style="color: white;">Ibrahim Irfan</a></h6>
</div>
</div>

</body>


</html>
