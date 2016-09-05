<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

// redirect to login if not logged in
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }
 // select logged in users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);

$exec = true;


 if ($userRow["userEmail"] == "1ibrahimirfan@gmail.com" || $userRow["userEmail"] == "laura"){
   $exec = true;
   $clusterManaging = "Principles";
 }elseif ($userRow["userEmail"] == "ezaan" || $userRow["userEmail"] == "jessica"){
   $exec = true;
   $clusterManaging = "Finance";
 }elseif ($userRow["userEmail"] == "aazib" || $userRow["userEmail"] == "melissa" || $userRow["userEmail"] == "sophie" || $userRow["userEmail"] == "asdaq"){
   $exec = true;
   $clusterManaging = "Marketing";
 }elseif ($userRow["userEmail"] == "amy" || $userRow["userEmail"] == "victoria"){
   $exec = true;
   $clusterManaging = "Hospitality";
 }elseif ($userRow["userEmail"] == "natania" || $userRow["userEmail"] == "jennifer"){
   $exec = true;
   $clusterManaging = "Business-Admin";
 }

/*
 if ($userRow["userEventAssigned"] == "PBM" || $userRow["userEventAssigned"] == "PMK" ||$userRow["userEventAssigned"] == "PFN" || $userRow["userEventAssigned"] == "PHT"){
   $currentCluster = "Principles";
 } elseif ($userRow["userEventAssigned"] == "PFL" || $userRow["userEventAssigned"] == "ACT" ||$userRow["userEventAssigned"] == "FTDM" || $userRow["userEventAssigned"] == "BFS"){
   $currentCluster = "Finance";
 }elseif ($userRow["userEventAssigned"] == "BTDM" || $userRow["userEventAssigned"] == "MTDM" ||$userRow["userEventAssigned"] == "STDM" || $userRow["userEventAssigned"] == "AAM"||
$userRow["userEventAssigned"] == "AASM"|| $userRow["userEventAssigned"] == "BSM"|| $userRow["userEventAssigned"] == "FMS"|| $userRow["userEventAssigned"] == "MMS"|| $userRow["userEventAssigned"] == "RMS"|| $userRow["userEventAssigned"] == "SEM"){
  $currentCluster = "Marketing";
 }elseif ($userRow["userEventAssigned"] == "HLM" || $userRow["userEventAssigned"] == "QSRM" ||$userRow["userEventAssigned"] == "RFSM" || $userRow["userEventAssigned"] == "HTDM"|| $userRow["userEventAssigned"] == "TTDM"){
   $currentCluster = "Hospitality";
 }elseif ($userRow["userEventAssigned"] == "BLTDM" || $userRow["userEventAssigned"] == "HRM"){
   $currentCluster = "Business-Admin";
 } */
 $currentCluster = "Finance";


 if(isset($_POST['submit'])) {

  $title = strip_tags(trim($_POST['title']));
  $body = strip_tags(trim($_POST['body']));

  $error = false;

  if (empty($title) || empty($body)){
    $error = true;
    $msg = "You must complete all fields.";
  }

  if (!$error){
    $query = "INSERT INTO announcements(title, body, cluster) VALUES('$title', '$body', '$clusterManaging')";
    $res = mysql_query($query);

    if ($res) {
        $msg = "Successfully posted announcement";
        //refresh
    }
  }
}

?>

<html>

<head>
    <title> IRHS DECA </title>
    <!-- Add jQuery library -->
    <link rel="icon" href="img/favicon.ico" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="css/main.css"></link>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/cssmenu/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-red.min.css">
</head>

<body>
<div id="wrapper">

<div id="mobile_menu">
  <img id="menu-logo" src="img/logo2.png" height="40" align="left">
  <img id="menu-bars" src="img/menu_bars.png" height="32" align="right">
</div>

<ul id="mobile_dropdown" style="display: none;">
    <li><a href='index.php'><span>Home</span></a></li>
    <li class="active"><a href='about.php'><span>About DECA</span></a></li>
    <li><a href='events.php'><span>Events</span></a></li>
    <li><a href='dashboard.php'><span>Dashboard</span></a></li>
    <li><a href='announcements.php'><span>Announcements</span></a></li>
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


  <div id='cssmenu'>
      <ul>
          <li><a href='index.php'><span>Home</span></a></li>
          <li><a href='about.php'><span>About DECA</span></a></li>
          <li><a href='events.php'><span>Events</span></a></li>
          <li class="active"><a href='dashboard.php'><span>Dashboard</span></a></li>
          <li><a href='announcements.php'><span>Announcements</span></a></li>
          <li><a href='dates.php'><span>Schedules</span></a></li>
             <li><a href='exams.php'><span>Exams</span></a></li>
          <li class='last'><a href='logout.php?logout'><span>Logout</span></a></li>
      </ul>
  </div>
    </br>

    <br/>



    <div class="content">
      <div class= "profile">
        <img src="img/avatar.png" align="left" height="120"/>
        <h3><?php echo $userRow['userFName']; echo " "; echo $userRow['userLName'] ?> </h3>
        <h4 id="event_assigned_code"></h4>
      </div>

        <br/>
        <br/>
        <div id="homework">
        <h4>Your Weekly Homework:</h4><img id="complete" src="img/complete.png" align="right" height="35" />
        <h5 id="exam_link"><u><a href="/Principles_1_Whole_Master.php" style="color: black;"></a></u></h5>
      </div>

        <br/>
        <br/>

            <?php if ($exec) {  ?>
               <h4><?php echo $clusterManaging; echo " Announcements"; ?></h4>
                <h4><?php echo $msg ?></h4>
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
              $res_cm = mysql_query("SELECT * FROM announcements WHERE cluster='".$clusterManaging."'");

              while ($ann = mysql_fetch_array($res_cm, MYSQL_ASSOC)) {
                ?>
                <div class="announce">
                <h4 id="ann-title"><?php echo $ann["title"]; ?></h4>
                <h5 id="ann-body"><?php echo $ann["body"]; ?></h5>
                <h6 id="ann-date"><?php echo $ann["datePosted"]; ?></h6>
                </div>
                <?php
              }
              mysql_free_result($res_cm);

              if ($currentCluster !== $clusterManaging){
                ?>
                <h4><?php echo $currentCluster; echo " Announcements"; ?></h4>
                <?php
                $res_cc = mysql_query("SELECT * FROM announcements WHERE cluster='".$currentCluster."'");

                while ($ann = mysql_fetch_array($res_cc, MYSQL_ASSOC)) {
                  ?>
                  <h4> currentCluster </h4>
                  <div class="announce">
                  <h4 id="ann-title"><?php echo $ann["title"]; ?></h4>
                  <h5 id="ann-body"><?php echo $ann["body"]; ?></h5>
                  <h5 id="ann-date"><?php echo $ann["datePosted"]; ?></h5>
                  </div>
                  <?php
                }
                mysql_free_result($res_cc);
              }

            } else {
              ?>
              <h4><?php echo $currentCluster; echo " Announcements"; ?></h4>
              <?php
              $res_cc = mysql_query("SELECT * FROM announcements WHERE cluster='".$currentCluster."'");

              while ($ann = mysql_fetch_array($res_cc, MYSQL_ASSOC)) {
                ?>
                <div class="announce">
                <h4 id="ann-title"><?php echo $ann["title"]; ?></h4>
                <h5 id="ann-body"><?php echo $ann["body"]; ?></h5>
                <h5 id="ann-date"><?php echo $ann["datePosted"]; ?></h5>
                </div>
                <?php
              }
              mysql_free_result($res_cc);
            }

              ?>
            </div>
    <div class="footer">
        <img id="altlogo" src="img/logo_alt.png" align="left" />
        <img id="fbimg" src="img/facebook-box.png" align="right" />
        <h6><a href="http://www.irhsdeca.com" style="color: white;">irhsdeca.com</a></h6>
    </div>
</div>
</body>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

<script type="text/javascript" src="js/menu.js"></script>
              <script type="text/javascript">
              var user_event_1 = "<?php echo $userRow['userEvent1']; ?>";
              var user_event_code = user_event_1.substring(user_event_1.lastIndexOf("(")+1,user_event_1.lastIndexOf(")"));

              document.getElementById('event_assigned_code').innerHTML = user_event_code;

              $('#exam_link u a').html(user_event_code + " Exam");
              </script>


</html>