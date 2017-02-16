<!DOCTYPE html>
<html>
<head>
  <title>CA DATA BASE</title>
  </style>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Always shows a header, even in smaller screens. -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body style="background-color:#E8E8E8;overflow-x:hidden;">

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
  echo "<script>location='search.php'</script>";
}elseif($arr2['status']==401){
  echo "<script>alert('Password Invalid')</script>";
}elseif($arr2['status']==400){
  echo "<script>alert('Invalid Credentials')</script>";
}

}
?>


    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header" style="height:16%;">
        <div class="mdl-layout__header-row" >
         <span class="mdl-layout-title" style="margin-left:80%;margin-top:7%;">KYChome</span>
        </div>
      </header>
     
      <main class="mdl-layout__content" style="margin-left:72%;">
        <div class="page-content"><!-- Your content goes here -->
      <div class="row">
    <div class="col-sm-9">
    </div>
    <div class="col-sm-3" style="margin-top:15%;width:250px;">
        <form name="myForm" method="post" action=""  style="background-color:white !important;padding:12px 0px 15px 10px">

          <p style="color:#607D8B;font-size:18px" id="admin_console">Admin Console</p>

          <p style="color:red"><?php echo $error_message ?></p>
          <div style="width:180px" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="username" name="username" required/>
            <label style="font-size:14px;" class="mdl-textfield__label" for="sample3">Username</label>
          </div>
          </p>
          </div>


          <div style="width:180px"  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="password" id="password" name="password" required/>
           <label style="font-size:14px;" class="mdl-textfield__label" for="sample3">Password</label>
          </div>
          </p>
          <br>
            <button type="submit" name="login_btn" id="login_btn" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Log in</button>
          </div>
        </form>
      </div>
      </div>
  </main>
</div>

</body>
</html>