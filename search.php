<?php
ob_start("ob_gzhandler");  //Enables Gzip compression 

session_start();
if($_SESSION['login_kyc_app'] == 1){

}else{
  echo "<script>location='index.php'</script>";
}

?>

<html>
  <head>
    <!---booottstrap-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="icon" type="image/png" sizes="36x36" href="images/green_icon.svg">

<script src='js/nprogress.js'></script>
<link rel='stylesheet' href='css/nprogress.css'/>

    <!-- Material Design Lite -->
  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/material.css">

  <link rel="stylesheet" type="text/css" href="css/kyc.css">
   <link rel="stylesheet" type="text/css" href="autocomplete-Files/styles.css">
    <!-- Material Design icon font -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="autocomplete-Files/styles.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Material Design Lite -->
  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="css/fileupload.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    
    <style type="text/css">
      .form-control{
      border: 2px solid #74b25e;
    border-radius: 7px;
      }

      div#load_screen{
  background: #e8e8e8;
  opacity: 1;
  position: fixed;
    z-index:10;
  top: 0px;
  width: 100%;
  height: 1600px;
}
div#load_screen > div#loading{
  color:#FFF;
  width:120px;
  height:24px;
  margin: 300px auto;
}
    </style>

<script type="text/javascript">

/*window.setInterval(function(){*/
var Url="check_session_valid.php";

  $.ajax({
  type: "POST",
  url: Url,
  dataType: 'json',
  data: {},
  success: function(fields){
    $.each(fields, function(idx, f){
      /*alert(f.status);*/

      var base_url = window.location.origin;
      if(base_url == "http://localhost"){
        url1="http://localhost/kyc-app/logout.php";
      }else{
        url1="https://kycapp.herokuapp.com/logout.php";
      }

      /*var host = window.location.host;

      var pathArray = window.location.pathname.split( '/' );*/

      /*alert(base_url);*/
      /*alert(host);
      alert(pathArray);*/

      if(f.status==400){
        /*alert(url1);*/
        window.location.href=url1;
      }
    });
  }
});

/*}, 5000);*/
</script>
  </head>

<body style="background-color:#E8E8E8;">
<div id="load_screen"><div id="loading"></div></div>

<!-- <div style="position:absolute;z-index:5000;margin-left:34.5%">
<img id="loading_spinner" style="position:absolute;z-index:2;" src="images/loading-spinner.gif">
</div> -->


<script type="text/javascript">
  /*$('#loading_spinner').show();*/
  NProgress.start();

window.onload = function () { NProgress.done(); }

/*$.ajax({
    url: 'suggestion.php',
    type: 'POST',
    data: '',
    dataType: 'html',
    success: function(data) {
        NProgress.done();
    }
});*/
</script>
<?php

$file= "autocomplete-Files/".$_SESSION['account_token'].".js";

?>

    <!-- AutoSearch Script files don't move -->
     <script type="text/javascript" src="autocomplete-Files/jquery-1.8.2.min.js"></script>
     <script type="text/javascript" src="autocomplete-Files/jquery.mockjax.js"></script>
     <script type="text/javascript" src="autocomplete-Files/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="autocomplete-Files/Logic_Search.js"></script>
        <script type="text/javascript" src="<?php echo $file; ?>"></script>  

<?php

if($_POST['is_user_delete'] != "" && $_POST['pk_delete'] != ""){
    $url_delete_entry = 'https://kyc-application.herokuapp.com/delete_entry/';
    $options_delete_entry = array(
      'http' => array(
        'header'  => array(
                      'IS-USER: '.$_POST['is_user_delete'],
                      'PK: '.$_POST['pk_delete'],
                    ),
        'method'  => 'GET',
      ),
    );
    $context_delete_entry = stream_context_create($options_delete_entry);
    $output_delete_entry = file_get_contents($url_delete_entry, false,$context_delete_entry);
    /*echo $output_can_be_deleted_or_no;*/
    $arr_delete_entry = json_decode($output_delete_entry,true);
    /*echo $arr_can_be_deleted_or_no['status'];*/
}else{
  /*echo "hi";*/
}
?>

<?php
/*if(isset($_POST['submit'])){
  $url_org = 'https://kyc-application.herokuapp.com/get_id_from_text/';
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

  $arr_org = json_decode($output_org,true);
  if($arr_org['response'][0]['message'] == 'organization'){
    $string1="<script>window.location.href='search_result.php?is_user=0&id=".$arr_org['response'][0]['pk']."'</script>";
    echo $string1;
  }else{
    $string2="<script>window.location.href='search_result.php?is_user=1&id=".$arr_org['response'][0]['pk']."'</script>";
    echo $string2;
  }
}*/
?>


<?php if($_POST['submit']){

  $string_new="<script>window.location.href='search_result.php?is_user=".$_POST['is_user_field']."&id=".$_POST['id_field']."'</script>";
  echo $string_new;

  /*echo $_POST["is_user_field"];
  echo $_POST["id_field"];*/
}?>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header style="background-color:#08426a;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row" >


       <a href="suggestion.php"> <img id="logo1" src="images/green_icon.svg"></img></a>
      <h5 style="" id="title2">ADMIN PANEL</h5>
         <span class="mdl-layout-title" id="title1" style="">KYCAPP</span>

         <a href="logout.php"><img id="logout" style="" src="images/logout_btn.png"></img></a>

          <!-- Add spacer, to align navigation to the right -->
          </div>
      </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">KYCAPP</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="suggestion.php">Home</a>
          <a class="mdl-navigation__link" href="new.php?is_user=0">New Entry Organization</a>
          <a class="mdl-navigation__link" href="new.php?is_user=1">New Entry Individual</a>
          <a class="mdl-navigation__link" href="missing_reports.php">Missing Reports</a>
          <a class="mdl-navigation__link" href="search_on_status.php?status=Work in process">Work In Process</a>
          <a class="mdl-navigation__link" href="search_on_status.php?status=Pending">Pending</a>
           <a class="mdl-navigation__link" href="search_on_status.php?status=Completed">Completed</a>
        <?php if($_SESSION['is_admin'] == 1){?>
          <a class="mdl-navigation__link" href="admin_page.php">Admin</a>
        <?php }?>
          <a class="mdl-navigation__link" href="">Help</a>
          <a class="mdl-navigation__link" href="">About Us</a>
          <a class="mdl-navigation__link" href="">Contact</a>
        </nav>
      </div></div>

<div class="container">
  <div class="row" > 

<script type="text/javascript">
  function fun1(){
    if(document.getElementById("id_field").value == ""){
      alert("Record not found");
      return false;
    }
  }
</script>

  <!-- AutoSearch TEXT field -->
  <!-- First Card Below -->
  <div class="card1" >
    <div class="card-header"> Database</div> 
      <div class="card-block">


        <div class="col-md-12" style="margin-left:11%;">
        <form id="target1" name="target1" class="form-group" method="post" action="" style="padding-bottom:7%">

        <input id="search" name="search" type="text" placeholder="Search firms or individuals" class="form-control input-md" style="width:71%;margin-top:4%;height:39px;border-color: #757575;" required onchange="this.form.submit()" autofocus>
      <input id="is_user_field" name="is_user_field" type="hidden"></input>
      <input id="id_field" name="id_field" type="hidden"></input>
        <button onclick="return fun1()" style="visibility:hidden;display:none;margin-left:58%;margin-top:-3.5%;width:200px;height:37px" class="mdl-button mdl-js-button mdl-button--raised" type="submit" value="Search" id="submit" name="submit">
        </button>
        </form>

        <div class="col-sm-2" style="margin-top:-12%;margin-left:73%;width:70px">
         <a href="all.php">
          <button class="mdl-button mdl-js-button mdl-button--raised new-entry-individual-btn-all">
          All
          </button>
        </a>
        </div>


          </div>   
      <!-- Below code for three buttons inside -->

       <div class="col-sm-2">
      <a href="new.php?is_user=1">
      <button class="mdl-button mdl-js-button mdl-button--raised new-entry-individual-btn">
      New Entry Individual
      </button>
      </a>
    </div>
    
    <div class="col-sm-1" style="width:10.66667%;">
        </div> 
        <div class="col-sm-2">
          <a href="new.php?is_user=0">
          <button class="mdl-button mdl-js-button mdl-button--raised new-entry-org-btn">
          New Entry Organization
          </button>
          </a>
        </div>

     <div class="col-sm-2" style="width:11.66667%;">
        </div>
        <div class="col-sm-2">

           <a href="missing_reports.php">
           <button class="mdl-button mdl-js-button mdl-button--raised missing-report-btn" data-tooltip-text="Missing Data">
         Missing Report
           </button>
           </a>
        </div>
        <div class="col-sm-2" style="width:11.66667%;">
        </div>
</div>
  </div>
    </div>
      </div>

    <!-- AutoSearch Function ends above -->
       <!--  <div id="tagname" style="height:100px; width:300px; border:1px solid #000;"></div>
 -->



<!-- New row for button below -->
<div class="container">
  <div class="row" > 
        <!-- Second Card below -->

   <div class="card2">
  <div class="card-header2">Assignment Status</div>
<div class="card-block2">
  
  <div class="col-sm-2">
<!-- Modal for Assignment--> 
     <button class="mdl-button mdl-js-button mdl-button--raised  assignment-btn" data-toggle="modal" data-target="#myModal"> Assignment</button>
    </div>

    <div class="col-sm-2">
      <a href="search_on_status.php?status=Pending">
      <button class="mdl-button mdl-js-button mdl-button--raised  pending-btn">
      Pending
      </button>
      </a>
    </div>

    <div class="col-sm-2" style="width:11.66667%;">
    </div>
    <div class="col-sm-2">
      <a href="search_on_status.php?status=Work in process">
      <button class="mdl-button mdl-js-button mdl-button--raised workin-btn">
      Work in process
      </button>
      </a>
    </div>
    <div class="col-sm-2" style="width:11.66667%;">
    </div>
    <div class="col-sm-2">

       <a href="search_on_status.php?status=Completed">
       <button class="mdl-button mdl-js-button mdl-button--raised completed-btn">
       Completed
       </button>
       </a>
    </div>

    </div>

</div>


        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!--         <script type="text/javascript" src="autocomplete-Files/styles.css"></script>
 --><!--  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
                $(document).ready(function(){
                    $("#search").autocomplete({

                        minLength:1
                    });
                });
        </script> -->
  </div>  
    </div>
      </div>
</body>

</html>

     



<!-- Assignment Modal  -->

<script type="text/javascript">
  function fun2(){
    if(document.getElementById("user_org_id").value == ""){
      alert("Record not found");
      return false;
    }
  }
</script>
<?php

if(isset($_POST['assignment_save'])){
  $url = 'https://kyc-application.herokuapp.com/add_popup_assignment/';
  $data = array(
              'user_org_id' => $_POST['user_org_id'],
              'is_user' => $_POST['is_user'],
              'type_of_work' => $_POST['type_of_work'],
              'status' => $_POST['status'],
              'date' => $_POST['date'],
              'due_date' => $_POST['due_date'],
              'comment' => $_POST['comment']
            );

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
    $arr = json_decode($result,true);
}


?>
<div class="modal fade" id="myModal" role="dialog" style="background-color:transparent;width:100%;min-height:100%;">
    <div class="modal-dialog" style="margin-top:11%">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center">Edit Assignment</h4> 
        </div>
        <div class="modal-body">
<!--           <form name="new_form" method="post" action=""> -->  
          <div style="text-align:center;">

       <form name="Form_ass" class="form-horizontal" method="post" enctype="multipart/form-data">

        <input id="assign_search" name="assign_search" type="text" placeholder="Search firms or individuals" class="form-control input-md" style="width:80%;margin-top:4%;height:39px;border-color: #757575;" required autofocus>
      <input id="is_user" name="is_user" type="hidden"></input>
      <input id="user_org_id" name="user_org_id" type="hidden"></input>
       <!--  <button style="visibility:hidden;display:none;margin-left:58%;margin-top:-3.5%;width:200px;height:37px" class="mdl-button mdl-js-button mdl-button--raised" type="submit" value="assign_search" id="submit" name="submit">
        </button> -->
 


          <div style="text-align:left">
          <label>Type of work:</label>
          </div>
              <select id="type_of_work" name="type_of_work" class="form-control" style="width: 80%;">
              <option value=""></option>
               <option value="Audit Report">Audit Report</option>
                <option value="ITR filing">ITR filing</option>
                <option value="VAT Filing">VAT Filing</option>
                <option value="Accounting">Accounting</option>
                <option value="Registration">Registration</option>
                <option value="Certification">Certification</option>
                <option value="Others">Others</option>
              </select>
          <div style="text-align:left">

          <label>Status</label> 
          </div>
          <select id="status" name="status" class="form-control" style="width: 80%;">
            <option value=""></option>
            <option value="Pending">Pending</option>
            <option value="Work in process">Work in process</option>
            <option value="Completed">Completed</option>
          </select>
          
          <div style="text-align:left">
            <label>Date:</label>  
          </div>
          <input id="date" name="date" value="<?php echo $_POST['date'] ?>" style="width:80%;" type="text" class="form-control input-md datepicker pick" >
          </input>
            
            <div style="text-align:left">
            <label>Due Date:</label>  
          </div>
          <input id="due_date" name="due_date" value="<?php echo $_POST['due_date'] ?>" style="width:80%;" type="text" class="form-control input-md datepicker due_date" >
          </input>


          <div style="text-align:left;margin-top:2%">
          <label>Comment:</label> 
          </div>
           <input id="comment" value="<?php echo $_POST['comment']?>" name="comment" type="text" placeholder="" class="form-control input-md" style="width: 80%;">
           </input>


           <button class="btn btn-save" style="color:white" name="assignment_save" id="assignment_save" type="submit">Save</button>
    </form>
 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
        <script type="text/javascript" src="autocomplete-Files/assign_logic.js"></script>

<!-- Datepicker -->
 <link rel="stylesheet" href="css/jquery-ui.css"> 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
var jQuery_1_12_0 = $.noConflict(true);
</script>

<script type="text/javascript">
 window.addEventListener("load", function(){
  var load_screen = document.getElementById("load_screen");
  document.body.removeChild(load_screen);
});
   
jQuery_1_12_0(function() {
  jQuery_1_12_0( ".datepicker.pick" ).datepicker({
    dateFormat : 'dd/mm/yy',
    changeMonth: true,changeYear: true,
     beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
            // 'z-index':4,
            width:300,
             
            });
        }, 10);
     }
}).datepicker("setDate", new Date());
});

jQuery_1_12_0(function() {
  jQuery_1_12_0( ".datepicker.due_date" ).datepicker({
    dateFormat : 'dd/mm/yy',
    changeMonth: true,changeYear: true,
     beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
            // 'z-index':4,
            width:300,
             
            });
        }, 10);
     }
}).datepicker("setDate", new Date());
});

</script>
<style type="text/css">
  
  .btn-save{
        color: #fff;
    background-color: #5cb85c;
    border-color: #5cb85c;
    margin-left: 2%;
    margin-top: 2%;
    width: 8em;
  }
</style>