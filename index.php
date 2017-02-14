<!DOCTYPE html>
<html>
<head>
  <title>CA DATA BASE</title>

  <style type="text/css">
.mdl-layout {
  align-items: center;
  justify-content: center;
}
.mdl-layout__content {
  padding: 24px;
  flex: none;
}
  </style>

  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>


<body>

<?php
if(isset($_POST['login_btn'])){
$url2 = 'https://kyc-application.herokuapp.com/check_is_admin/';
$options2 = array(
  'http' => array(
    'header'  => array(
                  'USERNAME: '.$_POST['username'],
                  'PASSWORD: '.$_POST['password'],
                ),
    'method'  => 'GET',
  ),
);
$context2 = stream_context_create($options2);
$output2 = file_get_contents($url2, false,$context2);
/*echo $output2;*/
$arr2 = json_decode($output2,true);
if($arr2['status']==200){
  echo "<script>location='admin_page.php'</script>";
}elseif($arr2['status']==401){
  echo "<script>alert('Password Invalid')</script>";
}elseif($arr2['status']==400){
  echo "<script>alert('Invalid Credentials')</script>";
}

}
?>

<div class="mdl-layout mdl-js-layout mdl-color--grey-100">
  <main class="mdl-layout__content" style="margin-left: 808px; margin-top: 113px;">
    <div class="mdl-card mdl-shadow--6dp">
      <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text">CA DATA BASE</h2>
      </div>
      <div class="mdl-card__supporting-text">
        <form action="index.php" method="post">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="username" name="username" required/>
            <label class="mdl-textfield__label" for="username">Username</label>
          </div>
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="password" id="password" name="password" required/>
            <label class="mdl-textfield__label" for="password">Password</label>
          </div>
          <div class="mdl-card__actions ">
            <button type="submit" name="login_btn" id="login_btn" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Log in</button>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>



</body>
</html>