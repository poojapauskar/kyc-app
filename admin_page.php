<head>
  <link rel="icon" type="image/png" sizes="36x36" href="images/green_icon.svg">

<link rel="stylesheet" type="text/css" href="css/material.indigo-pink.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
 <link rel="stylesheet" href="css/bootstrap.css">

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

$Header = ["Type of Organization","Name","Mobile","Email","Registration","Pan","Address","Partner UIDs","Registration Certificate","Pan Card","Telephone Bill","Bank Pass Book"];


echo '<table border="1"><tr>';
foreach ($Header as $key) {
   $key = ucwords($key);
   echo '<th>' . $key . '</th>';
}
echo '</tr>';


for($k=0;$k<count($arr['details']);$k++) {
   echo '<td>' . $arr['details'][$k]['type_of_org'] . '</td>';
   echo '<td>' . $arr['details'][$k]['name'] . '</td>';
   echo '<td>' . $arr['details'][$k]['mobile'] . '</td>';
   echo '<td>' . $arr['details'][$k]['email'] . '</td>';
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

$Header = ["Name","Mobile","Email","DOB","Proffesion","Pan","Address","Aadhar No.","Designation","UID","Pan Card","Telephone Bill","Bank Pass Book","Voter Id","Passport","Aadhar Card","Image"];


echo '<table border="1"><tr>';
foreach ($Header as $key) {
   $key = ucwords($key);
   echo '<th>' . $key . '</th>';
}
echo '</tr>';


for($k=0;$k<count($arr2['details']);$k++) {
   echo '<td>' . $arr2['details'][$k]['name'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['mobile'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['email'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['dob'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['proffesion'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['pan'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['address'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['aadhar_no'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['designation'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['uid'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['pan_card'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['telephone_bill'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['bank_pass_book'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['voter_id'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['passport'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['aadhar_card'] . '</td>';
   echo '<td>' . $arr2['details'][$k]['image'] . '</td>';
   echo '</tr>';
}

echo '</table>';

}


if(isset($_POST['submit_img'])){
$url3 = 'https://kyc-application.herokuapp.com/export_images/';
    $options3 = array(
      'http' => array(
        'header'  => array(
                      'PK: '.$_POST['admin_pk'],
                    ),
        'method'  => 'GET',
      ),
    );
    $context3 = stream_context_create($options3);
    $output3 = file_get_contents($url3, false,$context3);
    /*echo $output_can_be_deleted_or_no;*/
    /*echo $output;*/
    $arr3 = json_decode($output3,true);

# create new zip opbject
$zip = new ZipArchive();

# create a temp file & open it
$tmp_file = tempnam('.','');
$zip->open($tmp_file, ZipArchive::CREATE);

for($c=0;$c<count($arr3['organization']);$c++){
  if($arr3['organization'][$c]['url_telephone_bill'] != ""){
    $download_file = file_get_contents($arr3['organization'][$c]['url_telephone_bill']);

    $extension1 = pathinfo($arr3['organization'][$c]['url_telephone_bill'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1); 

    $parts = explode("?",$arr3['organization'][$c]['url_telephone_bill']); 

    #add it to the zip
    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['organization'][$c]['name']."_telephone_bill.".$extension1['0']);
  }

  if($arr3['organization'][$c]['url_reg_certificate'] != ""){
    $download_file = file_get_contents($arr3['organization'][$c]['url_reg_certificate']);
    
    $extension1 = pathinfo($arr3['organization'][$c]['url_reg_certificate'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1); 


    $parts = explode("?",$arr3['organization'][$c]['url_reg_certificate']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['organization'][$c]['name']."_reg_certificate.".$extension1['0']);
  }

  if($arr3['organization'][$c]['url_pan_card'] != ""){
    $download_file = file_get_contents($arr3['organization'][$c]['url_pan_card']);

    $extension1 = pathinfo($arr3['organization'][$c]['url_pan_card'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1);

    $parts = explode("?",$arr3['organization'][$c]['url_pan_card']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['organization'][$c]['name']."_pan_card.".$extension1['0']);
  }

  if($arr3['organization'][$c]['url_pass_book'] != ""){
    $download_file = file_get_contents($arr3['organization'][$c]['url_pass_book']);
    
    $extension1 = pathinfo($arr3['organization'][$c]['url_pass_book'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1);

    $parts = explode("?",$arr3['organization'][$c]['url_pass_book']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['organization'][$c]['name']."_pass_book.".$extension1['0']);
  }
}
for($c=0;$c<count($arr3['users']);$c++){
  if($arr3['users'][$c]['url_pan_card'] != ""){
    $download_file = file_get_contents($arr3['users'][$c]['url_pan_card']);

    $extension1 = pathinfo($arr3['users'][$c]['url_pan_card'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1);

    $parts = explode("?",$arr3['users'][$c]['url_pan_card']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['users'][$c]['uid']."_pan_card.".$extension1['0']);
  }
  if($arr3['users'][$c]['url_telephone_bill'] != ""){
    $download_file = file_get_contents($arr3['users'][$c]['url_telephone_bill']);
    
    $extension1 = pathinfo($arr3['users'][$c]['url_telephone_bill'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1);

    $parts = explode("?",$arr3['users'][$c]['url_telephone_bill']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['users'][$c]['uid']."_telephone_bill.".$extension1['0']);
  }
  if($arr3['users'][$c]['url_bank_pass_book'] != ""){
    $download_file = file_get_contents($arr3['users'][$c]['url_bank_pass_book']);
    
    $extension1 = pathinfo($arr3['users'][$c]['url_bank_pass_book'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1);

    $parts = explode("?",$arr3['users'][$c]['url_bank_pass_book']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['users'][$c]['uid']."_bank_pass_book.".$extension1['0']);
  }
  if($arr3['users'][$c]['url_voter_id'] != ""){
    $download_file = file_get_contents($arr3['users'][$c]['url_voter_id']);
    
    $extension1 = pathinfo($arr3['users'][$c]['url_voter_id'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1);

    $parts = explode("?",$arr3['users'][$c]['url_voter_id']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['users'][$c]['uid']."_voter_id.".$extension1['0']);
  }
  if($arr3['users'][$c]['url_passbook'] != ""){
    $download_file = file_get_contents($arr3['users'][$c]['url_passbook']);
    
    $extension1 = pathinfo($arr3['users'][$c]['url_passbook'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1);

    $parts = explode("?",$arr3['users'][$c]['url_passbook']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['users'][$c]['uid']."_passbook.".$extension1['0']);
  }
  if($arr3['users'][$c]['url_aadhar_card'] != ""){
    $download_file = file_get_contents($arr3['users'][$c]['url_aadhar_card']);

    $extension1 = pathinfo($arr3['users'][$c]['url_aadhar_card'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1);

    $parts = explode("?",$arr3['users'][$c]['url_aadhar_card']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['users'][$c]['uid']."_aadhar_card.".$extension1['0']);
  }
  if($arr3['users'][$c]['url_image'] != ""){
    $download_file = file_get_contents($arr3['users'][$c]['url_image']);
    
    $extension1 = pathinfo($arr3['users'][$c]['url_image'], PATHINFO_EXTENSION);
    $extension1 = explode("?",$extension1);
    
    $parts = explode("?",$arr3['users'][$c]['url_image']); 

    $zip->addFromString(basename($parts['0']),$download_file);
    $zip->renameName(basename($parts['0']),$arr3['users'][$c]['uid']."_image.".$extension1['0']);
  }
}

# close zip
$zip->close();

# send the file to the browser as a download
header('Content-disposition: attachment; filename=Images.zip');
header('Content-type: application/zip');

// Add these
ob_clean();
flush();

readfile($tmp_file);

    /*$arr = json_decode($output,true);*/
    /*echo $arr_can_be_deleted_or_no['status'];*/
}else{
  /*echo "hi";*/
}
?>

<div style="margin-top:2%">
<a style="margin-left:2%;" href="index.php">Back</a>
<br>
<br>
<form action="admin_page.php" method="post">
  <input type="hidden" name="admin_pk" value="<?php echo $_SESSION['admin_pk'] ?>">
  <button type="submit" class="btn btn-success" style="color:white;margin-left:2%" name="submit_org">Export All Organization</button>
  <button type="submit" class="btn btn-success" style="color:white;margin-left:2%" name="submit_usr">Export All Users</button>
  <button type="submit" class="btn btn-success" style="color:white;margin-left:2%" name="submit_img">Export Images</button>
</form> 

<form enctype="multipart/form-data" action="excel-upload1.php" method="post" >
  
  <!-- <label style="margin-left:2%" class="form-label span3" for="file">Import Students</label><br><br>
   -->
   <input style="margin-left:1%;margin-top:2%" type="file" name="file1" id="file1" required />
  
  
  <br><br>
  <button class="btn btn-success" style="color:white;" type="submit">
    Import Organization
    </button>

</form>

<form enctype="multipart/form-data" action="excel-upload2.php" method="post" >
  
  <!-- <label style="margin-left:2%" class="form-label span3" for="file">Import Students</label><br><br>
   -->
   <input style="margin-left:1%;margin-top:2%" type="file" name="file2" id="file2" required />
  
  
  <br><br>
  <button class="btn btn-success" style="color:white;" type="submit">
    Import Users
    </button>

</form>
</div>