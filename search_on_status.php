<?php
session_start();
if($_SESSION['login_kyc_app'] == 1){

}else{
  echo "<script>location='index.php'</script>";
}

?>

<html>
  <head>

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="icon" type="image/png" sizes="36x36" href="images/green_icon.svg">

<link rel="stylesheet" type="text/css" href="css/material.indigo-pink.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
 <link rel="stylesheet" type="text/css" href="css/table.css"> 
 <link rel="stylesheet" type="text/css" href="css/kyc.css"> 
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/material.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="javascript/material.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/material.css">
 <link rel="stylesheet" type="text/css" href="css/fileupload.css">
    <!-- Material Design icon font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.material.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );
} );
</script>
<!-- Modal Script -->


<script type="text/javascript">
$(function(){

$('#trigger').click(function(){
  $('#myModal').modal('show');
  return false;
})

});

$('#myModal').on('shown.bs.modal', function () {
    $(this).find('.modal-dialog').css({width:'auto',
                               height:'auto', 
                              'max-height':'100%'});
});
</script>

<div class="container">

    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
</div>

<!-- Mdodal End -->
<style>

.mdl-data-table td:last-of-type {
    padding-right: 45px;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 60%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

/*tr:nth-child(even) {
    background-color: #dddddd;
}*/
</style>
<!-- 
<script type="text/javascript">

window.setInterval(function(){
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
        url1="https://kyc-application.herokuapp.com/logout.php";
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

}, 5000);
</script>
 -->
</head>
<body style="background-color:#E8E8E8;overflow-x:hidden;">

<?php
session_start();
?>

<?php

if(isset($_POST['new_save'])){
  $url_edit = 'https://kyc-application.herokuapp.com/edit_status_comment/';
  $options_edit = array(
    'http' => array(
      'header'  => array(
                          'PK: '.$_POST['pk'],
                          'STATUS: '.$_POST['new_status'],
                          'COMMENT: '.$_POST['new_comment'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_edit = stream_context_create($options_edit);
  $output_edit = file_get_contents($url_edit, false,$context_edit);
  /*echo $output_status;*/
  $arr_edit = json_decode($output_edit,true);
} 

?>

<?php

if($_GET['status'] == "Work%20in%20process"){
  $status1="Work in process";
}else{
  $status1=$_GET['status'];
}

  $url_status = 'https://kyc-application.herokuapp.com/search_on_status/';
  $options_status = array(
    'http' => array(
      'header'  => array(
                          'STATUS: '.$status1,
                          'ACCOUNT-TOKEN: '.$_SESSION['account_token'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_status = stream_context_create($options_status);
  $output_status = file_get_contents($url_status, false,$context_status);
  /*echo $output_status;*/
  $arr_status = json_decode($output_status,true);
  /*echo $arr_status[0]['additional_info']['status'];
  echo $arr_status[0]['details']['name'];
  echo $arr_status[0]['is_user'];*/
  

?>

      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header style="background-color:#08426a;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header">
    <div class="mdl-layout__header-row" >
        <a href="suggestion.php"><img id="logo1" src="images/green_icon.svg"></img></a>
<span class="mdl-layout-title" id="title3" style="margin-left:35%"><?php echo $_GET['status'] ?></span>
        <span class="mdl-layout-title" id="title1" style="text-align:center">KYCAPP</span>
   <a href="logout.php"><img id="logout" style="" src="images/logout_btn.png"></img></a>         <!-- Add spacer, to align navigation to the right -->
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
      </div>
      
<div class="container">
  <div class="row" style="margin-top:4%;"> 

  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect clear-pendingpage" style="" type="button" id="test">Clear</button>
<script type="text/javascript">
$('#test').click(function() {
    /*$('input[type=search]').val('');*/
    $('#example').dataTable().fnFilter('');
    /*table.search('').draw();*/ //required after
});
</script>

<table id="example" class="mdl-data-table" cellspacing="0" style="margin:auto;width:75%;margin-top:12%;">
        <thead>
            <th>Name</th>
            <th>User/Organization</th>
            <th>Type of work</th>
            <th>Status</th>
            <th>Date</th>
            <th>Comment</th>
            <th>Details</th>
        </thead>
        
        
           </tr>
  <?php for($i=0;$i<count($arr_status);$i++){
     if($arr_status[0]['is_user']=="0"){
      $field="Organization";
      $field2="search_result.php?is_user=0&id=".$arr_status[$i]['additional_info']['user_org_id'];
     }else{
      $field="User";
      $field2="search_result.php?is_user=1&id=".$arr_status[$i]['additional_info']['user_org_id'];
     }
  ?>
  <tr>

    <td><?php echo $arr_status[$i]['details']['name'] ?></td>
    <td><?php echo $field ?></td>
    <td><?php echo $arr_status[$i]['additional_info']['type_of_work'] ?></td>
    <td><?php echo $arr_status[$i]['additional_info']['status'] ?></td>
    <td><?php echo $arr_status[$i]['additional_info']['date'] ?></td>
    <td><?php echo $arr_status[$i]['additional_info']['comment'] ?></td>
    <td>
   <!--  <form method="post" action="<?php echo $field2; ?>"> -->
      <!-- <button type="submit" class="btn btn-success" style="color:white">Details</button> -->
       <button type="button" class="btn btn-success" style="color:white;" data-toggle="modal" data-target="#myModal<?php echo $i ?>">Edit</button>
   <!--  </form> -->
<div class="modal fade" id="myModal<?php echo $i ?>" role="dialog" style="background-color:transparent;width:100%;min-height:100%;">
    <div class="modal-dialog" style="margin-top:11%">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4> 
        </div>
        <div class="modal-body">
          <form name="new_form" method="post" action="">
          <input id="pk" name="pk" type="hidden" placeholder="" value="<?php echo $arr_status[$i]['additional_info']['pk'] ?>" class="form-control input-md" style="width: 80%;">
          </input>

          <div style="text-align:left">
          <label>Status</label> 
          </div>
          <select id="new_status" name="new_status" class="form-control" style="width: 80%;">
            <option value="<?php echo $arr_status[$i]['additional_info']['status'] ?>"><?php echo $arr_status[$i]['additional_info']['status'] ?></option>
            <option value=""></option>
            <option value="Pending">Pending</option>
            <option value="Work in process">Work in process</option>
            <option value="Completed">Completed</option>
          </select>

          <div style="text-align:left;margin-top:2%">
          <label>Comment</label> 
          </div>
           <input id="new_comment" value="<?php echo $arr_status[$i]['additional_info']['comment'] ?>" name="new_comment" type="text" placeholder="" class="form-control input-md" style="width: 80%;">
           </input>

           <button class="btn btn-success" style="color:white" name="new_save" id="new_save" type="submit">Save</button>
           </form>
 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- <a href="new_user_popup.php" style="color:white" target="_blank" data-toggle="modal" data-target="#myModal">

     <button type="button" class="btn btn-info new_entry_btn" /*style="margin-left:0%"*/>
       New Entry
     </button> -->

    </td>
  </tr>
  <?php }?>
  
</table>
</div>
</div>
</body>
</html>

