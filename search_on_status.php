<html>
  <head>


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
 <link rel="stylesheet" href="css/table.css"> 
 <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="css/material.css">
    <!-- <script src="javascript/material.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="css/material.css">
    <!-- Material Design icon font -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
 <!-- <link rel="stylesheet" href="https://html.nkdev.info/_con/assets/_con/css/con-base.min.css">
 <link rel="stylesheet" href="https://html.nkdev.info/_con/assets/_con/css/con-base.min.css"> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.material.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
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
</head>
<body style="background-color:#E8E8E8;overflow-x:hidden;">

<?php

  $url_status = 'https://kyc-application.herokuapp.com/search_on_status/';
  $options_status = array(
    'http' => array(
      'header'  => array(
                          'STATUS: '.$_GET['status'],
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

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#08426a;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" >

        <a href="search.php"><img style="margin-top:36%;margin-left:28px;width:50px;height:50px" src="images/green.png"></img></a>
<h5 style="margin-left:35%;margin-top:9%;"><?php echo $_GET['status'] ?></h5>
         <span class="mdl-layout-title" style="margin-left:26%;margin-top:7%;">KYCApp</span>
          <!-- Add spacer, to align navigation to the right -->
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="search.php">Home</a>
          <a class="mdl-navigation__link" href="new.php?is_user=0">New Entry Organization</a>
          <a class="mdl-navigation__link" href="new.php?is_user=1">New Entry Individual</a>
          <a class="mdl-navigation__link" href="missing_reports.php">Missing Reports</a>
          <a class="mdl-navigation__link" href="search.php">Admin</a>
          <a class="mdl-navigation__link" href="">Help</a>
          <a class="mdl-navigation__link" href="">About Us</a>
          <a class="mdl-navigation__link" href="">Contact</a>
        </nav>
      </div>
        </div>
      </header>

<div class="container">
  <div class="row" style="margin-top:4%;"> 

<table id="example" class="mdl-data-table" cellspacing="0" style="margin-left:12%;width:75%;margin-top:12%;">
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
    <form method="post" action="<?php echo $field2; ?>">
      <button type="submit" class="btn btn-success" style="color:white">Details</button>
    </form>

    </td>
  </tr>
  <?php }?>
  
</table>
</div>
</div>
</body>
</html>

