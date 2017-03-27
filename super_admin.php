<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
if(isset($_POST['submit'])){
	$url = 'https://kyc-application.herokuapp.com/account/';
  $data = array(
              'company' => $_POST['company'],
              'admin_username' => $_POST['admin_username'],
              'admin_password' => $_POST['admin_password'],
              'user1_username' => $_POST['user1_username'],
              'user1_password' => $_POST['user1_password'],
              'user2_username' => $_POST['user2_username'],
              'user2_password' => $_POST['user2_password'],
            );

    // use key 'http' even if you send the request to https://...
    $options = array(
      'http' => array(
        'header'  => "Content-Type: application/json\r\n" .
                     "Accept: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode( $data ),
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

<form align="center" style="margin-top:1%" action="super_admin.php" method="post">

<div class="container" style="width:50%;border:1px solid black;padding-bottom:25px">
  <div class="row" style="margin-top:25px">
    <div class="col-sm-4">
      <input type="text" name="company" placeholder="Account Name">
    </div>
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
    </div>
  </div>

<br>

  <div class="row">
    <div class="col-sm-4">
      <input type="text" name="admin_username" placeholder="Admin Name">
    </div>
    <div class="col-sm-4">
      <input type="text" name="admin_password" placeholder="Password">
    </div>
    <div class="col-sm-4">
    </div>
  </div>

<br>

  <div class="row">
    <div class="col-sm-4">
      <input type="text" name="user1_username" placeholder="User 1 Name">
    </div>
    <div class="col-sm-4">
      <input type="text" name="user1_password" placeholder="Password">
    </div>
    <div class="col-sm-4">
    </div>
  </div>

<br>

  <div class="row">
    <div class="col-sm-4">
      <input type="text" name="user2_username" placeholder="User 2 Name">
    </div>
    <div class="col-sm-4">
      <input type="text" name="user2_password" placeholder="Password">
    </div>
    <div class="col-sm-4">
      <input type="submit" name="submit" id="submit" style="margin-top:1%;width:100px;height:30px;background-color:green" value="Add">
    </div>
  </div>
</div>

</form> 

</body>
</html>
