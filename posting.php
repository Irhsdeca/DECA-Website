<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(isset($_POST['submit'])) {

 $uplName = strip_tags(trim($_POST['name']));
 $uplsong = (int)$_POST['song'];

$error = false;
 if (empty($uplName) || empty($uplsong)){
   $error = true;
 }
 if (!$error){
   $query = "INSERT INTO hackw(uploaderName, song) VALUES('$uplName', '$uplSong')";
   echo $query;
  $res = mysql_query($query);
   if ($res) {
    echo "Done!";
  }else{
    echo mysql_error();
  }
 }

}


?>
<html>

<body>
  <form method='post'>
  <input id='name' name='name'></input><br>
  <input id='song' name='song'></input><br>
  <input id="submit" name="submit" type="submit" value="Submit">
  </input>
  </form>
<?php

$res_cm = mysql_query("SELECT * FROM hackw");

while ($ann = mysql_fetch_array($res_cm, MYSQL_ASSOC)) {
  $data[] = $ann;
}
$data = array_reverse($data,true);

foreach ($data as $announcement){
  ?>
  <h4 id="ann-title"><?php echo $announcement["uploaderName"]; ?></h4>
  <h5 id="ann-body"><?php echo $announcement["song"]; ?></h5>
  <h5 id="ann-body"><?php echo $announcement["subId"]; ?></h5>
  <?php
}
mysql_free_result($res_cm);
?>

</body>

</html>