<html>
  <head>
    <!---bootstrap-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
  </head>

<body>

<?php
if(isset($_POST['submit'])){
  $url_org = 'https://kyc-application.herokuapp.com/search/';
  $options_org = array(
    'http' => array(
      'header'  => array(
                          'TEXT: '.$_POST['search'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_org = stream_context_create($options_org);
  $output_org = file_get_contents($url_org, false,$context_org);
  /*echo $output_org;*/
  $arr_org = json_decode($output_org,true);


  if($arr_org['response'][0]['message'] == 'organization'){
    $string1="<script>window.location.href='search_organization.php?text=".$arr_org['response'][0]['text']."'</script>";
    echo $string1;
  }else{
    $string2="<script>window.location.href='search_user.php?text=".$arr_org['response'][0]['text']."'</script>";
    echo $string2;
  }

}
?>

<a href="index.php" class="btn btn-default btn-sm" style="margin-left:60%;margin-top:4%;">
<span class="glyphicon glyphicon-log-out"></span> Log out
</a>

 <div class="container">
  <div class="row" style="margin-top:4%;margin-left:4%"> 
    <form class="form-wrapper" method="post" action="">
    <input type="text" id="search" name="search" placeholder="Search firm,Individual
    " required>
    <input type="submit" value="Search" id="submit" name="submit">
    </form>

    <div class="col-sm-1">
    </div>
    <div class="col-sm-2">
      <a href="new_organization.php">
      <button style="background-color:#CCC;width:200px;height:60px" class="mdl-button mdl-js-button mdl-button--raised">
      <p>New Entry<br>Organization</p>
      </button>
      </a>
    </div>
    <div class="col-sm-2" style="width:11.66667%;">
    </div>
    <div class="col-sm-2">
      <a href="new_user.php">
      <button style="background-color:#CCC;width:200px;height:60px" class="mdl-button mdl-js-button mdl-button--raised">
      <p>New Entry<br>Individual</p>
      </button>
      </a>
    </div>
    <div class="col-sm-2" style="width:11.66667%;">
    </div>
    <div class="col-sm-2">

       <a href="missing_reports.php">
       <button style="background-color:#CCC;width:200px;height:60px" class="mdl-button mdl-js-button mdl-button--raised">
       <p>Missing Report</p>
       </button>
       </a>
    </div>
</div>
</div>
</body>
</html>