<!DOCTYPE html>
<html>
<body>

<?php
if(isset($_POST['submit'])){
	$url = 'https://kyc-application.herokuapp.com/account/';
    $data = array('company' => $_POST['company'],'username' => $_POST['username'],'password' => $_POST['password'],'role' => $_POST['role']);
    // use key 'http' even if you send the request to https://...
    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
      ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    /*echo $result8;*/
    $arr = json_decode($result,true);
    if($arr != ''){
      echo "<script>alert('New Account Added')</script>";
    }
}
?>

<a href="index.php">Back</a>

<form align="center" style="margin-top:5%" action="super_admin.php" method="post">
  Company:<br>
  <input type="text" name="company">
  <br><br>
  Username:<br>
  <input type="text" name="username">
  <br><br>
  Password:<br>
  <input type="text" name="password">
  <br><br>
  Role:<br>
  <select name="role" style="width:154px;height:23px">
	  <option value="admin">Admin</option>
	  <option value="user">User</option>
  </select>
  <br><br>
  <input type="submit" name="submit" id="submit" style="width:100px;height:50px;background-color:green" value="Submit">
</form> 

</body>
</html>
