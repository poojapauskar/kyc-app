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
<<<<<<< HEAD

=======
>>>>>>> 2c57d394328b0475b4cf29f64ba4e861a9c1c432
    <link rel="stylesheet" href="css/material.css">
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


    <div class="demo-layout-transparent mdl-layout mdl-js-layout">
       <header style="background-color:#08426a;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;  /* Chrome and Safari         */
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;  /* Firefox 3.6               */
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" >
        <img style="margin-top:5%" src="images/Different-Honda-Logo.png"></img>
         <span class="mdl-layout-title" style="margin-left:80%;margin-top:7%;">KYChome</span>
        </div>
      </header>
<<<<<<< HEAD

=======
     
>>>>>>> 2c57d394328b0475b4cf29f64ba4e861a9c1c432
      <main class="mdl-layout__content" style="margin-left:75%;">
        <div class="page-content"><!-- Your content goes here -->
      <div class="row">
    <div class="col-sm-9">
    </div>
<<<<<<< HEAD

=======
>>>>>>> 2c57d394328b0475b4cf29f64ba4e861a9c1c432
    <div class="col-sm-3" style="margin-top:15%;width:230px;">
    <form name="myForm" method="post" action=""  style="background-color:white !important;padding:12px 0px 15px 18px">

      <p style="color:rgba(0,0,0,.87);font-size:18px;font-weight:500;" id="admin_console">Admin Console</p>
      <p style="color:red"><?php echo $error_message ?></p>
        <div style="width:190px;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="username" name="username" required/>
        <label style="font-size:14px;" class="mdl-textfield__label" for="sample3">Username</label>
        </div>
        </p>
      
          <div style="width:190px;margin-top:-24px;"  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="password" id="password" name="password" required/>
           <label style="font-size:14px;" class="mdl-textfield__label" for="sample3">Password</label>
          </div>
          </p>
          <br>
<<<<<<< HEAD

         <button type="submit" name="login_btn" id="login_btn" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-top:-31px;">Log in</button>
=======
            <button type="submit" name="login_btn" id="login_btn" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-top:-31px;">Log in</button>
>>>>>>> 2c57d394328b0475b4cf29f64ba4e861a9c1c432
          </div>
        </form>
      </div>
      </div>
  </main>
</div>

</body>
</html>