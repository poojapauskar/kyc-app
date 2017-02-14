<html>
<head>
<style>
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
<body>

<?php
$url_missing_report = 'https://kyc-application.herokuapp.com/missing_report/';
$options_missing_report = array(
  'http' => array(
    'method'  => 'GET',
  ),
);
$context_missing_report = stream_context_create($options_missing_report);
$output_missing_report = file_get_contents($url_missing_report, false,$context_missing_report);
/*echo count($output_missing_report);*/
$arr_missing_report = json_decode($output_missing_report,true);
/*echo count($arr_missing_report);*/

?>

<table style="margin-left:20%;margin-top:0%">
  <tr>
    <th>Name</th>
    <th>UID</th>
    <th>Missing File</th>
    <th>Action</th>
  </tr>
  <?php for($i=0;$i<count($arr_missing_report);$i++){?>
  <tr>
    <td><?php echo $arr_missing_report[$i]['name'] ?></td>
    <td><?php echo $arr_missing_report[$i]['uid'] ?></td>
    <td><?php echo $arr_missing_report[$i]['missing_file'] ?></td>
    <td><button>Generate Link</button></td>
  </tr>
  <?php }?>
  
</table>
</body>
</html>
