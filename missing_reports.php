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
if(isset($_POST['login_btn'])){
$url_missing_report = 'https://kyc-application.herokuapp.com/missing_report/';
$options_missing_report = array(
  'http' => array(
    'header'  => array(
                  'USERNAME: '.$_POST['username'],
                  'PASSWORD: '.$_POST['password'],
                ),
    'method'  => 'GET',
  ),
);
$context_missing_report = stream_context_create($options_missing_report);
$output_missing_report = file_get_contents($url_missing_report, false,$context_missing_report);
/*echo $output_missing_report;*/
$arr_missing_report = json_decode($output_missing_report,true);
if($arr_missing_report['status']==_missing_report00){
  echo "<script>location='search.php'</script>";
}elseif($arr_missing_report['status']==401){
  echo "<script>alert('Password Invalid')</script>";
}elseif($arr_missing_report['status']==400){
  echo "<script>alert('Invalid Credentials')</script>";
}

}
?>

<table style="margin-left:20%;margin-top:10%">
  <tr>
    <th>Name</th>
    <th>UID</th>
    <th>Missing File</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
    <td><button>Generate Link</button></td>
  </tr>
  
</table>
</body>
</html>
