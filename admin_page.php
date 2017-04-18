<head>

<link rel="stylesheet" type="text/css" href="css/material.indigo-pink.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
 <link rel="stylesheet" href="css/bootstrap.css">
</head>
<?php

session_start();
if($_SESSION['is_admin'] != 1){
  echo "<script>location='index.php'</script>";
}


if(isset($_POST['submit'])){
    $url = 'http://127.0.0.1:8000/export_a_firm/';
    $options = array(
      'http' => array(
        'header'  => array(
                      'PK: '.$_POST['admin_pk'],
                    ),
        'method'  => 'GET',
      ),
    );
    $context = stream_context_create($options);
    $output = file_get_contents($url, false,$context);
    /*echo $output_can_be_deleted_or_no;*/
    /*echo $output;*/
    $arr = json_decode($output,true);

/*echo $arr;*/
$arr[0]['organization'][0]['type_of_org'];

/*$columnHeader = '';  
$setData = '';  
$columnHeader = "Type of Organization" . "\t" . "Name" . "\t" . "Registration" . "\t" . "Address" . "\t";

 
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n";  

for($i=0;$i<count($arr[0]['organization']);$i++){
  $setData= $arr[0]['organization'][$i]['type_of_org']. "\t" . $arr[0]['organization'][$i]['name'] . "\t" . $arr[0]['organization'][$i]['registration'] . "\t" . $arr[0]['organization'][$i]['address'] . "\t"; 
  echo $setData . "\n"; 
}*/


    /*$arr = json_decode($output,true);*/
    /*echo $arr_can_be_deleted_or_no['status'];*/
}else{
  /*echo "hi";*/
}
?>

<div style="margin-top:2%">
<a style="margin-left:2%;" href="search.php">Back</a>
<br>
<br>
<form action="admin_page.php" method="post">
  <input type="hidden" name="admin_pk" value="<?php echo $_SESSION['admin_pk'] ?>">
  <button type="submit" class="btn btn-success" style="color:white;margin-left:2%" name="submit">Import All Data</button>
</form> 
</div>