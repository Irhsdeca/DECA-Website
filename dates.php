<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
?>

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

  <div id='cssmenu'>
      <ul>
          <li><a href='index.php'><span>Home</span></a></li>
          <li class="active"><a href='about.php'><span>About DECA</span></a></li>
          <li><a href='events.php'><span>Events</span></a></li>
          <li><a href='dashboard.php'><span>Dashboard</span></a></li>
          <li><a href='announcements.php'><span>Announcements</span></a></li>
          <li class='active'><a href='dates.php'><span>Schedules</span></a></li>
          <?php if( !isset($_SESSION['user']) ) { ?>
             <li><a href='register.php'><span>Register</span></a></li>
             <li class='last'><a href='login.php'><span>Login</span></a></li>
             <?php } else { ?>
               <li class='last'><a href='login.php?logout'><span>Logout</span></a></li>
            <?php
          }
          ?>
      </ul>
  </div>
  </br>


<div class="content">

<h4>Meeting Schedule</h4>
  <table class="mdl-data-table mdl-js-data-table" id="meetings">
    <thead id="table-heading">
      <tr>
          <td witdh="500">Cluster</td><td width="175">Day of Week</td><td width="250">Executives</td>
      </tr>
    </thead>
    <tbody>
    <tr>  <td>Principles</td><td>Monday</td><td>Ibrahim and Laura</td> </tr>
    <tr>    <td>Finance</td><td>Tuesday</td><td>Jessica and Ezaan</td>
    <tr>      <td>Marketing (Group 1)</td><td>Wednesday</td><td>Aazib and Melissa</td></tr>
<tr>            <td>Marketing (Group 2)</td><td>Wednesday</td><td>Asdaq and Sophie</td></tr>
  <tr>            <td>Business Admin</td><td>Thursday</td><td>Natania and Jennifer</td></tr>
    <tr>            <td>Hospitality</td><td>Friday</td><td>Amy and Victoria</td></tr>
    </tbody>
  </table>
<br/>
<div id="regionals">
<img id="date1" src="img/nov8.png" width="150"/>
</div>
<div id="provincials">
<img id="date2" src="img/feb9.png" width="150"/>

<img id="date3" src="img/apr24.png" width="150"/>



</div>


<div class="footer">
  <img id="altlogo" src="img/logo_alt.png" width="100" align="left"/>
  <img id="fbimg" src="img/facebook-box.png" width="45" align="right"/>
<h6><a href="irhsdeca.com" style="color: white;">irhsdeca.com</a></h6>
</div>
</body>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script src="js/dates.js" type="text/javascript"></script>


</html>
