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
    $url = 'https://kyc-application.herokuapp.com/export_a_firm/';
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
    /*$file = file_get_contents('path of your file');*/
    file_put_contents('file.xls', $output);
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