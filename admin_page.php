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


if(isset($_POST['submit_org'])){
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
    /*echo $output;*/
    $arr = json_decode($output,true);
  
header('Content-Disposition: attachment; filename=Organization.xls');
header('Content-type: application/force-download');
header('Content-Transfer-Encoding: binary');
header('Pragma: public');
//print "\xEF\xBB\xBF"; // UTF-8 BOM
$h = array();

$Header = ["Type of Organization","Name","Registration","Pan","Address","Partner UIDs","Registration Certificate","Pan Card","Telephone Bill","Bank Pass Book"];


echo '<table border="1"><tr>';
foreach ($Header as $key) {
   $key = ucwords($key);
   echo '<th>' . $key . '</th>';
}
echo '</tr>';


for($k=0;$k<count($arr['details']);$k++) {
   echo '<td>' . $arr['details'][$k]['type_of_org'] . '</td>';
   echo '<td>' . $arr['details'][$k]['name'] . '</td>';
   echo '<td>' . $arr['details'][$k]['registration'] . '</td>';
   echo '<td>' . $arr['details'][$k]['pan'] . '</td>';
   echo '<td>' . $arr['details'][$k]['address'] . '</td>';
   echo '<td>' . $arr['details'][$k]['partner_uids'] . '</td>';
   echo '<td>' . $arr['details'][$k]['reg_certificate'] . '</td>';
   echo '<td>' . $arr['details'][$k]['pan_card'] . '</td>';
   echo '<td>' . $arr['details'][$k]['telephone_bill'] . '</td>';
   echo '<td>' . $arr['details'][$k]['pass_book'] . '</td>';
   echo '</tr>';
}

echo '</table>';

}
if(isset($_POST['submit_usr'])){
$url2 = 'https://kyc-application.herokuapp.com/export_users/';
    $options2 = array(
      'http' => array(
        'header'  => array(
                      'PK: '.$_POST['admin_pk'],
                    ),
        'method'  => 'GET',
      ),
    );
    $context2 = stream_context_create($options2);
    $output2 = file_get_contents($url2, false,$context2);
    /*echo $output_can_be_deleted_or_no;*/
    /*echo $output;*/
    $arr2 = json_decode($output2,true);

header('Content-Disposition: attachment; filename=User.xls');
header('Content-type: application/force-download');
header('Content-Transfer-Encoding: binary');
header('Pragma: public');
//print "\xEF\xBB\xBF"; // UTF-8 BOM
$h = array();

$Header = ["UID","Name","DOB","Proffesion","Pan","Pan Card","Address","Telephone Bill","Bank Pass Book","Voter Id","Passport","Aadhar No.","Aadhar Card","Image","Designation"];


echo '<table border="1"><tr>';
foreach ($Header as $key) {
   $key = ucwords($key);
   echo '<th>' . $key . '</th>';
}
echo '</tr>';


for($k=0;$k<count($arr2['details']);$k++) {
   echo '<td>' . $arr2['details'][$k]['uid'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['name'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['dob'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['pan'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['proffesion'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['pan'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['pan_card'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['address'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['telephone_bill'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['bank_pass_book'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['voter_id'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['passport'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['aadhar_no'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['aadhar_card'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['image'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['designation'] . '</td>';
   echo '</tr>';
}

echo '</table>';

}
?>

<div style="margin-top:2%">
<a style="margin-left:2%;" href="search.php">Back</a>
<br>
<br>
<form action="admin_page.php" method="post">
  <input type="hidden" name="admin_pk" value="<?php echo $_SESSION['admin_pk'] ?>">
  <button type="submit" class="btn btn-success" style="color:white;margin-left:2%" name="submit_org">Import All Organization</button>
  <button type="submit" class="btn btn-success" style="color:white;margin-left:2%" name="submit_usr">Import All Users</button>
</form> 
</div>