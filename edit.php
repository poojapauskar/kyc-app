<!DOCTYPE html>
<html>
<head>
  <title></title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/material.indigo-pink.min.css">

<link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="autocomplete-Files/styles.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="css/material.css">
    <link rel="stylesheet" href="css/fileupload.css">
     <link rel="stylesheet" href="autocomplete-Files/styles.css">

 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <style type="text/css">
    span:before{
    content:" "; 
    display:inline-block; 
    width:32px;
}

.mdl-radio {
    position: relative;
    font-size: 14px;
    line-height: 24px;
    display: inline-block;
    box-sizing: border-box;
    font-weight: 500;
    margin: 0;
    padding-left: 0;
}
    </style>
    <script type="text/javascript">

   function setfilename(val)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
   document.getElementById("uploadFile").value = fileName;
  }

   function panfilename(val)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
   document.getElementById("pan_upload").value = fileName;
  }

  function telefilename(val)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
   document.getElementById("telephone_upload").value = fileName;
  }

  function bankfilename(val)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
   document.getElementById("bank_upload").value = fileName;
  }
</script>
<script type="text/javascript"> 
function disablefield(){ 
if (document.getElementById('radios-1').checked == 1){ 
document.getElementById('uploadFile').disabled='disabled'; 
document.getElementById('reg_certificate').disabled='disabled'; 
document.getElementById('uploadFile').value='Choose File';
}else { 
document.getElementById('uploadFile').disabled='';
document.getElementById('reg_certificate').disabled='';  
document.getElementById('uploadFile').value='Choose File'; } 
} 
</script>
  <script type="text/javascript">
    $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload1").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload1").click();
    });
});
  </script>
  <style type="text/css">
    .upload-button {
    padding: 4px;
   /* border: 1px solid black;*/
    border-radius: 5px;
    display: block;
    float: left;
}

.profile-pic {
    max-width: 160px;
    max-height: 160px;
    display: block;
}

.file-upload1 {
    display: none;
}
  </style>  
</head>
<!-- <body  style="overflow-y:scroll;background-color:#E8E8E8" >
 --><body style="background-color:#E8E8E8;overflow-x:hidden;">

<?php

if ($_GET['is_user']==0) { 
  $is_user="0";
  $pk_value=$_POST['org_id'];
}else{
  $is_user="1";
  $pk_value=$_POST['user_id'];
}

$url_search = 'https://kyc-application.herokuapp.com/search/';
$options_search = array(
  'http' => array(
    'header'  => array(
                  'IS-USER: '.$is_user,
                  'PK: '.$pk_value,
                ),
    'method'  => 'GET',
  ),
);
$context_search = stream_context_create($options_search);
$output_search = file_get_contents($url_search, false,$context_search);
/*echo $output_search;*/
$arr_search = json_decode($output_search,true);
/*echo $arr_search;*/


/*echo count($arr_search['response'][0]['partner_details'])*/
?>


<?php

if(isset($_POST["edit_btn"]) and $_GET["is_user"]==0) {

        /*$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }*/

        $names=array();
        $names[0]= "reg_cert".rand(0, 9999).".jpg";
        $names[1]= "pan_card".rand(0, 9999).".jpg";
        $names[2]= "pass_book".rand(0, 9999).".jpg";
        $names[3]= "telephone_bill".rand(0, 9999).".jpg";
        $names[4]= $randomString.rand(0, 9999).".jpg";


        /*Get Signed Urls*/
        $url = 'https://kyc-application.herokuapp.com/get_signed_url/';
        $data = array('image_list' => [$names[0],$names[1],$names[2],$names[3],$names[4]]);

        $options = array(
          'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'PUT',
            'content' => json_encode($data),
          ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        /*echo $result;*/
        $arr = json_decode($result,true);

        /*echo $arr[0][0];
        echo $arr[0]['id'];
        echo $arr[1][1];
        echo $arr[1]['id'];*/
    

    $check = getimagesize($_FILES["reg_certificate"]["tmp_name"]);
    if($check !== false) {
        $url_upload = $arr[0][0];
        /*echo $url_upload;*/


        $filename = $_FILES["reg_certificate"]["tmp_name"];
        $file = fopen($filename, "rb");
        $data = fread($file, filesize($filename));

        /*echo $data;*/

        $options_upload = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data,
          ),
        );
        $context_upload  = stream_context_create($options_upload);
        $result_upload = file_get_contents($url_upload, false, $context_upload);
        /*var_dump($result_upload);*/
        $arr_upload = json_decode($result_upload,true);
        /*var_dump($arr_upload);*/

        $reg_certificate_id=$arr[0]['id'];

    } else {
        $reg_certificate_id=$arr_search['response'][0]['reg_certificate_details'][0]['pk'];
    }


    $check_pan = getimagesize($_FILES["pan_card"]["tmp_name"]);
    if($check_pan !== false) {
        $url_upload_pan = $arr[1][1];
        /*echo $url_upload;*/


        $filename_pan = $_FILES["pan_card"]["tmp_name"];
        $file_pan = fopen($filename_pan, "rb");
        $data_pan = fread($file_pan, filesize($filename_pan));

        /*echo $data;*/

        $options_upload_pan = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_pan,
          ),
        );
        $context_upload_pan  = stream_context_create($options_upload_pan);
        $result_upload_pan = file_get_contents($url_upload_pan, false, $context_upload_pan);
        /*var_dump($result_upload_pan);*/
        $arr_upload_pan = json_decode($result_upload_pan,true);
        /*var_dump($arr_upload_pan);*/

        $pan_card_id=$arr[1]['id'];

    } else {
        $pan_card_id=$arr_search['response'][0]['pan_card_details'][0]['pk'];;
    }

    $check_pass_book = getimagesize($_FILES["bank_pass_book"]["tmp_name"]);
    if($check_pass_book !== false) {
        $url_upload_pass_book = $arr[2][2];
        /*echo $url_upload;*/


        $filename_pass_book = $_FILES["bank_pass_book"]["tmp_name"];
        $file_pass_book = fopen($filename_pass_book, "rb");
        $data_pass_book = fread($file_pass_book, filesize($filename_pass_book));

        /*echo $data;*/

        $options_upload_pass_book = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_pass_book,
          ),
        );
        $context_upload_pass_book  = stream_context_create($options_upload_pass_book);
        $result_upload_pass_book = file_get_contents($url_upload_pass_book, false, $context_upload_pass_book);
        /*var_dump($result_upload_pass_book);*/
        $arr_upload_pass_book = json_decode($result_upload_pass_book,true);
        /*var_dump($arr_upload_pass_book);*/

        $pass_book_id=$arr[2]['id'];

    } else {
        $pass_book_id=$arr_search['response'][0]['pass_book_details'][0]['pk'];;
    }

    $check_telephone_bill = getimagesize($_FILES["telephone_bill"]["tmp_name"]);
    if($check_telephone_bill !== false) {
        $url_upload_telephone_bill = $arr[3][3];
        /*echo $url_upload;*/


        $filename_telephone_bill = $_FILES["telephone_bill"]["tmp_name"];
        $file_telephone_bill = fopen($filename_telephone_bill, "rb");
        $data_telephone_bill = fread($file_telephone_bill, filesize($filename_telephone_bill));

        /*echo $data;*/

        $options_upload_telephone_bill = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_telephone_bill,
          ),
        );
        $context_upload_telephone_bill  = stream_context_create($options_upload_telephone_bill);
        $result_upload_telephone_bill = file_get_contents($url_upload_telephone_bill, false, $context_upload_telephone_bill);
        /*var_dump($result_upload_telephone_bill);*/
        $arr_upload_telephone_bill = json_decode($result_upload_telephone_bill,true);
        /*var_dump($arr_upload_telephone_bill);*/

        $telephone_bill_id=$arr[3]['id'];

    } else {
        $telephone_bill_id=$arr_search['response'][0]['telephone_bill_details'][0]['pk'];;
    }

  
  $partner_names='';
  for($j=0;$j<count($_POST['partner_names']);$j++){
    $partner_names=$partner_names.",".$_POST['partner_names'][$j];
  }
  $partner_names = ltrim($partner_names, ',');
/*  echo $partner_names;*/
  for($k=0;$k<count($_POST['partner_designations']);$k++){
    $partner_designations=$partner_designations.",".$_POST['partner_designations'][$k];
  }
  $partner_designations = ltrim($partner_designations, ',');
  /*echo $partner_designations;*/

  $type_of_work='';
  for($j=0;$j<count($_POST['type_of_work']);$j++){
    $type_of_work=$type_of_work.",".$_POST['type_of_work'][$j];
  }
  $type_of_work = ltrim($type_of_work, ',');

  $status='';
  for($j=0;$j<count($_POST['status']);$j++){
    $status=$status.",".$_POST['status'][$j];
  }
  $status = ltrim($status, ',');

  $date='';
  for($j=0;$j<count($_POST['date']);$j++){
    $date=$date.",".$_POST['date'][$j];
  }
  $date = ltrim($date, ',');

  $comment='';
  for($j=0;$j<count($_POST['comment']);$j++){
    $comment=$comment.",".$_POST['comment'][$j];
  }
  $comment = ltrim($comment, ',');


  $url_org = 'https://kyc-application.herokuapp.com/edit_organization/';
  $options_org = array(
    'http' => array(
      'header'  => array(
                          'PK: '.$_POST['org_id'],
                          'TYPE-OF-ORG: '.$_POST['type_of_org'],
                          'NAME: '.$_POST['name'],
                          'REGISTRATION: '.$_POST['registration'],
                          'REG-CERTIFICATE: '.$reg_certificate_id,
                          'PAN: '.$_POST['pan'],
                          'PAN-CARD: '.$pan_card_id,
                          'ADDRESS: '.$_POST['address'],
                          'TELEPHONE-BILL: '.$telephone_bill_id,
                          'PASS-BOOK: '.$pass_book_id,
                          'NO-OF-PARTNERS: '.$_POST['no_of_partners'],
                          'PARTNER-NAMES: '.$partner_names,
                          'PARTNER-DESIGNATIONS: '.$partner_designations,
                          'TYPE-OF-WORK: '.$type_of_work,
                          'STATUS: '.$status,
                          'DATE: '.$date,
                          'COMMENT: '.$comment,
                          ),
      'method'  => 'GET',
    ),
  );
  $context_org = stream_context_create($options_org);
  $output_org = file_get_contents($url_org, false,$context_org);
  $arr_org = json_decode($output_org,true);

/*  echo $arr_org['pk'];*/

  if($arr_org['status']==200){
    /*echo "<script>alert('Organization Updated')</script>";*/
    
    $string1="<script>window.location.href='search_result.php?is_user=0&id=".$arr_org['pk']."'</script>";
    echo $string1;
  }
}
?>

<?php

if(isset($_POST["edit_btn"]) and $_GET["is_user"]==1) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $names=array();
        $names[0]= "pan_card".rand(0, 9999).".jpg";
        $names[1]= "voter_id".rand(0, 9999).".jpg";
        $names[2]= "pass_book".rand(0, 9999).".jpg";
        $names[3]= "telephone_bill".rand(0, 9999).".jpg";
        $names[4]= "aadhar_card".rand(0, 9999).".jpg";
        $names[5]= "passport".rand(0, 9999).".jpg";
        $names[6]= "profile".rand(0, 9999).".jpg";


        /*Get Signed Urls*/
        $url = 'https://kyc-application.herokuapp.com/get_signed_url/';
        $data = array('image_list' => [$names[0],$names[1],$names[2],$names[3],$names[4],$names[5],$names[6]]);

        $options = array(
          'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'PUT',
            'content' => json_encode($data),
          ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        /*echo $result;*/
        $arr = json_decode($result,true);

        /*echo $arr[0][0];
        echo $arr[0]['id'];
        echo $arr[1][1];
        echo $arr[1]['id'];*/
    

    $check = getimagesize($_FILES["pan_card"]["tmp_name"]);
    if($check !== false) {
        $url_upload = $arr[0][0];
        /*echo $url_upload;*/


        $filename = $_FILES["pan_card"]["tmp_name"];
        $file = fopen($filename, "rb");
        $data = fread($file, filesize($filename));

        /*echo $data;*/

        $options_upload = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data,
          ),
        );
        $context_upload  = stream_context_create($options_upload);
        $result_upload = file_get_contents($url_upload, false, $context_upload);
        /*var_dump($result_upload);*/
        $arr_upload = json_decode($result_upload,true);
        /*var_dump($arr_upload);*/

        $pan_card_id=$arr[0]['id'];

    } else {
        $pan_card_id=$arr_search['response'][0]['pan_card_details'][0]['pk'];
    }


    $check_voter_id = getimagesize($_FILES["voter_id"]["tmp_name"]);
    if($check_voter_id !== false) {
        $url_upload_voter_id = $arr[1][1];
        /*echo $url_upload;*/


        $filename_voter_id = $_FILES["voter_id"]["tmp_name"];
        $file_voter_id = fopen($filename_voter_id, "rb");
        $data_voter_id = fread($file_voter_id, filesize($filename_voter_id));

        /*echo $data;*/

        $options_upload_voter_id = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_voter_id,
          ),
        );
        $context_upload_voter_id  = stream_context_create($options_upload_voter_id);
        $result_upload_voter_id = file_get_contents($url_upload_voter_id, false, $context_upload_voter_id);
        /*var_dump($result_upload_voter_id);*/
        $arr_upload_voter_id = json_decode($result_upload_voter_id,true);
        /*var_dump($arr_upload_voter_id);*/

        $voter_card_id=$arr[1]['id'];

    } else {
        $voter_card_id=$arr_search['response'][0]['voter_id_details'][0]['pk'];
    }

    $check_pass_book = getimagesize($_FILES["bank_pass_book"]["tmp_name"]);
    if($check_pass_book !== false) {
        $url_upload_pass_book = $arr[2][2];
        /*echo $url_upload;*/


        $filename_pass_book = $_FILES["bank_pass_book"]["tmp_name"];
        $file_pass_book = fopen($filename_pass_book, "rb");
        $data_pass_book = fread($file_pass_book, filesize($filename_pass_book));

        /*echo $data;*/

        $options_upload_pass_book = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_pass_book,
          ),
        );
        $context_upload_pass_book  = stream_context_create($options_upload_pass_book);
        $result_upload_pass_book = file_get_contents($url_upload_pass_book, false, $context_upload_pass_book);
        /*var_dump($result_upload_pass_book);*/
        $arr_upload_pass_book = json_decode($result_upload_pass_book,true);
        /*var_dump($arr_upload_pass_book);*/

        $pass_book_id=$arr[2]['id'];

    } else {
        $pass_book_id=$arr_search['response'][0]['bank_pass_book_details'][0]['pk'];
    }

    $check_telephone_bill = getimagesize($_FILES["telephone_bill"]["tmp_name"]);
    if($check_telephone_bill !== false) {
        $url_upload_telephone_bill = $arr[3][3];
        /*echo $url_upload;*/


        $filename_telephone_bill = $_FILES["telephone_bill"]["tmp_name"];
        $file_telephone_bill = fopen($filename_telephone_bill, "rb");
        $data_telephone_bill = fread($file_telephone_bill, filesize($filename_telephone_bill));

        /*echo $data;*/

        $options_upload_telephone_bill = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_telephone_bill,
          ),
        );
        $context_upload_telephone_bill  = stream_context_create($options_upload_telephone_bill);
        $result_upload_telephone_bill = file_get_contents($url_upload_telephone_bill, false, $context_upload_telephone_bill);
        /*var_dump($result_upload_telephone_bill);*/
        $arr_upload_telephone_bill = json_decode($result_upload_telephone_bill,true);
        /*var_dump($arr_upload_telephone_bill);*/

        $telephone_bill_id=$arr[3]['id'];

    } else {
        $telephone_bill_id=$arr_search['response'][0]['telephone_bill_details'][0]['pk'];
    }

    $check_aadhar_card = getimagesize($_FILES["aadhar_card"]["tmp_name"]);
    if($check_aadhar_card !== false) {
        $url_upload_aadhar_card = $arr[4][4];
        /*echo $url_upload;*/


        $filename_aadhar_card = $_FILES["aadhar_card"]["tmp_name"];
        $file_aadhar_card = fopen($filename_aadhar_card, "rb");
        $data_aadhar_card = fread($file_aadhar_card, filesize($filename_aadhar_card));

        /*echo $data;*/

        $options_upload_aadhar_card = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_aadhar_card,
          ),
        );
        $context_upload_aadhar_card  = stream_context_create($options_upload_aadhar_card);
        $result_upload_aadhar_card = file_get_contents($url_upload_aadhar_card, false, $context_upload_aadhar_card);
        /*var_dump($result_upload_aadhar_card);*/
        $arr_upload_aadhar_card = json_decode($result_upload_aadhar_card,true);
        /*var_dump($arr_upload_aadhar_card);*/

        $aadhar_card_id=$arr[4]['id'];

    } else {
        $aadhar_card_id=$arr_search['response'][0]['aadhar_card_details'][0]['pk'];
    }

    $check_passport = getimagesize($_FILES["passport"]["tmp_name"]);
    if($check_passport !== false) {
        $url_upload_passport = $arr[5][5];
        /*echo $url_upload;*/


        $filename_passport = $_FILES["passport"]["tmp_name"];
        $file_passport = fopen($filename_passport, "rb");
        $data_passport = fread($file_passport, filesize($filename_passport));

        /*echo $data;*/

        $options_upload_passport = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_passport,
          ),
        );
        $context_upload_passport  = stream_context_create($options_upload_passport);
        $result_upload_passport = file_get_contents($url_upload_passport, false, $context_upload_passport);
        /*var_dump($result_upload_passport);*/
        $arr_upload_passport = json_decode($result_upload_passport,true);
        /*var_dump($arr_upload_passport);*/

        $passport_id=$arr[5]['id'];

    } else {
        $passport_id=$arr_search['response'][0]['passport_details'][0]['pk'];
    }

    $check_image = getimagesize($_FILES["image"]["tmp_name"]);
    if($check_image !== false) {
        $url_upload_image = $arr[6][6];
        /*echo $url_upload;*/


        $filename_image = $_FILES["image"]["tmp_name"];
        $file_image = fopen($filename_image, "rb");
        $data_image = fread($file_image, filesize($filename_image));

        /*echo $data;*/

        $options_upload_image = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_image,
          ),
        );
        $context_upload_image  = stream_context_create($options_upload_image);
        $result_upload_image = file_get_contents($url_upload_image, false, $context_upload_image);
        /*var_dump($result_upload_image);*/
        $arr_upload_image = json_decode($result_upload_image,true);
        /*var_dump($arr_upload_image);*/

        $image_id=$arr[6]['id'];

    } else {
        $image_id=$arr_search['response'][0]['image_details'][0]['pk'];
    }

  $type_of_work='';
  for($j=0;$j<count($_POST['type_of_work']);$j++){
    $type_of_work=$type_of_work.",".$_POST['type_of_work'][$j];
  }
  $type_of_work = ltrim($type_of_work, ',');

  $status='';
  for($j=0;$j<count($_POST['status']);$j++){
    $status=$status.",".$_POST['status'][$j];
  }
  $status = ltrim($status, ',');

  $date='';
  for($j=0;$j<count($_POST['date']);$j++){
    $date=$date.",".$_POST['date'][$j];
  }
  $date = ltrim($date, ',');

  $comment='';
  for($j=0;$j<count($_POST['comment']);$j++){
    $comment=$comment.",".$_POST['comment'][$j];
  }
  $comment = ltrim($comment, ',');

  $url_org = 'https://kyc-application.herokuapp.com/edit_user/';
  $options_org = array(
    'http' => array(
      'header'  => array(
                          'UID: '.$_POST['uid'],
                          'NAME: '.$_POST['name'],
                          'DOB: '.$_POST['date'],
                          'PROFFESION: '.$_POST['profession'],
                          'PAN: '.$_POST['pan'],
                          'PAN-CARD: '.$pan_card_id,
                          'ADDRESS: '.$_POST['address'],
                          'TELEPHONE-BILL: '.$telephone_bill_id,
                          'BANK-PASS-BOOK: '.$pass_book_id,
                          'VOTER-ID: '.$voter_card_id,
                          'PASSPORT: '.$passport_id,
                          'AADHAR-NO: '.$_POST['aadhar_no'],
                          'AADHAR-CARD: '.$aadhar_card_id,
                          'IMAGE: '.$image_id,
                          'TYPE-OF-WORK: '.$type_of_work,
                          'STATUS: '.$status,
                          'DATE: '.$date,
                          'COMMENT: '.$comment,
                          ),
      'method'  => 'GET',
    ),
  );
  $context_org = stream_context_create($options_org);
  $output_org = file_get_contents($url_org, false,$context_org);
  $arr_org = json_decode($output_org,true);

  if($arr_org['status']==200){
    /*echo "<script>alert('IndividualUpdated')</script>";*/

    $string1="<script>window.location.href='search_result.php?is_user=1&id=".$arr_org['pk']."'</script>";
    echo $string1;

    /*echo $output_org;*/

  }
}

?>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header style="background-color:#08426a;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row" >

    <img style="margin-top:5%;margin-left:28px;width:50px;height:50px" src="images/green.png"></img>
    <h5 style="margin-left:35%;margin-top:9%;"><?php echo $arr_search['response'][0]['organization_details']['name'] ?><?php echo $arr_search['response'][0]['user_details']['name'] ?></h5>
    <span class="mdl-layout-title" style="margin-left:26%;margin-top:7%;">KYChome</span>
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

<?php if ($_GET['is_user']==0) { ?>
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

<fieldset>

<!-- Form Name -->
<!-- <legend>CA Database</legend>
 --><!-- <h4><center><?php echo $arr_search['response'][0]['organization_details']['name'] ?></center></h4> -->


 <input type="hidden" value="<?php echo $arr_search['response'][0]['organization_details']['pk'] ?>" name="org_id" id="org_id"></input>


<!-- Select Basic -->
<div class="form-group" style="margin-top:10%">
  <label class="col-md-4 control-label" for="type_of_org">Type of Organization:</label>
  <div class="col-md-4">
    <select id="type_of_org" name="type_of_org" class="form-control">
      <option value="<?php echo $arr_search['response'][0]['organization_details']['type_of_org'];?>"><?php echo $arr_search['response'][0]['organization_details']['type_of_org'];?></option>
      <option value="Partnership">Partnership</option>
      <option value="Individual">Individual</option>
    </select>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textname">Name:</label>  
  <div class="col-md-4">
  <input value="<?php echo $arr_search['response'][0]['organization_details']['name'];?>" id="name" name="name" type="text" placeholder="Enter Name" class="form-control input-md">
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="registration">Registration:</label>
  <div class="col-md-4"> 
    

<?php if($arr_search['response'][0]['organization_details']['registration'] == 1 ){
  $checked1="checked";
  $checked2="";
}if($arr_search['response'][0]['organization_details']['registration'] == 0 ){
  $checked1="";
  $checked2="checked";
}
?>

<label class="mdl-radio mdl-js-radio" for="radios-0">
      <input type="radio" name="registration" id="radios-0" value="1" class="mdl-radio__button" checked="checked"  checked="<?php echo $checked1; ?>" onChange="disablefield();">
      Registered
    </label> 
     
     <label class="mdl-radio mdl-js-radio" for="radios-1">
      <input type="radio" name="registration" id="radios-1" value="0" class="mdl-radio__button" checked="<?php echo $checked2; ?>" onChange="disablefield();" >
      Un-Registered
    </label>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="reg_certificate">Registration Certificate:</label>

<div class="col-md-4">

    <input id="uploadFile" class="form-control input-md" value="<?php echo $arr_search['response'][0]['reg_certificate_details'][0]['name']; ?>">
    <div class="fileUpload btn btn-info" style="margin-left:105%;margin-top:-12%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="reg_certificate" name="reg_certificate" type="file" class="upload" onchange="setfilename(this.value);" /> 
  

<?php
  $url_img_download = 'https://kyc-application.herokuapp.com/download/';
  $options_img_download = array(
    'http' => array(
      'header'  => array(
                          'IMAGE-NAME: '.$arr_search['response'][0]['reg_certificate_details'][0]['name'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_img_download = stream_context_create($options_img_download);
  $output_img_download = file_get_contents($url_img_download, false,$context_img_download);
  /*echo $output_img_download;*/
  $arr_img_download = json_decode($output_img_download,true);
  
?>


</div>

<button style="margin-top:-24%;margin-left:129%;" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=reg_certificate_details&link=<?php echo $arr_img_download[0]['url']; ?>">View</a>
</button>

</div>

</div>

<!-- Text input-->
<div class="form-group" style="margin-top:-3%">
  <label class="col-md-4 control-label" for="textinput" style="margin-left:-67%">PAN:</label>
  <div class="col-md-4">
  <input id="pan" name="pan" style="margin-left:-107%" pattern="-?[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}?" title="Must be of the form ARLPA0061H"  value="<?php echo $arr_search['response'][0]['organization_details']['pan'] ?>" type="text" placeholder="PAN Card Number" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN Card:</label>
<div class="col-md-4">
    <input id="pan_upload" class="form-control input-md" value="
 <?php echo $arr_search['response'][0]['pan_card_details'][0]['name']; ?>"/>
   <div class="fileUpload btn btn-info" style="margin-left:105%;margin-top:-12%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="pan_card" name="pan_card" type="file" class="upload" onchange="panfilename(this.value);" />
  
  
<?php
  $url_img_download_2 = 'https://kyc-application.herokuapp.com/download/';
  $options_img_download_2 = array(
    'http' => array(
      'header'  => array(
                          'IMAGE-NAME: '.$arr_search['response'][0]['pan_card_details'][0]['name'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_img_download_2 = stream_context_create($options_img_download_2);
  $output_img_download_2 = file_get_contents($url_img_download_2, false,$context_img_download_2);
  /*echo $output_img_download;*/
  $arr_img_download_2 = json_decode($output_img_download_2,true);
  
?>
</div>
<button style="margin-top:-24%;margin-left:129%;" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=pan_card_details&link=<?php echo $arr_img_download_2[0]['url']; ?>">View</a>
</button>
</div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address"><?php echo $arr_search['response'][0]['organization_details']['address'] ?></textarea>
  </div>
</div>

<!-- Multiple Checkboxes  and File upload Button -->   

<div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes">Address Proof:</label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
    <?php if($arr_search['response'][0]['telephone_bill_details'][0]['name'] != ''){
      $check_box_select1="checked";
    }else{
      $check_box_select1="";
    }?>
     <input <?php echo $check_box_select1;?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Telephone</label>
  </div>

<!-- <div class="col-md-1">
    <input id="telephone_upload" class="form-control input-md" value="
     <?php echo $arr_search['response'][0]['telephone_bill_details'][0]['name']; ?>">
     <div class="fileUpload btn btn-info" style="margin-left:155%;margin-top:-21%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="telephone_bill" name="telephone_bill"  value="<?php echo $arr_search['response'][0]['organization_details']['telephone'] ?>" style="margin-top: -20px;margin-left: 146px;" type="file" class="upload" onchange="telefilename(this.value);" />  -->
    <div class="col-md-3" style="margin-left:43%;margin-top:-2%"> 
<?php echo $arr_search['response'][0]['telephone_bill_details'][0]['name']; ?>
</div>
    <div class="fileUpload btn btn-info" style="margin-left:-1%;margin-top:-1%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="telephone_bill" name="telephone_bill" type="file" class="upload"  value="<?php echo $arr_search['response'][0]['organization_details']['telephone'] ?>" onchange="telefilename(this.value);" />
 
<?php
  $url_img_download_3 = 'https://kyc-application.herokuapp.com/download/';
  $options_img_download_3 = array(
    'http' => array(
      'header'  => array(
                          'IMAGE-NAME: '.$arr_search['response'][0]['telephone_bill_details'][0]['name'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_img_download_3 = stream_context_create($options_img_download_3);
  $output_img_download_3 = file_get_contents($url_img_download_3, false,$context_img_download_3);
  /*echo $output_img_download;*/
  $arr_img_download_3 = json_decode($output_img_download_3,true);
  
?>
</div>

<br>
<button style="margin-left:75%;margin-top:-6%;" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=telephone_bill_details&link=<?php echo $arr_img_download_3[0]['url']; ?>">View</a>
</button>
</div> 


<div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4"> 
   <label class="checkbox-inline" for="checkboxes-0">
     <?php if($arr_search['response'][0]['pass_book_details'][0]['name'] != ''){
      $check_box_select2="checked";
      
     }else{
      $check_box_select2="";
    }?>
     <input <?php echo $check_box_select2;?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1"/>Bank Passbook</label>
  
  </div>
<div class="col-md-3" style="margin-left:43%;margin-top:-2%"> 
<?php echo $arr_search['response'][0]['pass_book_details'][0]['name']; ?>
</div>
    <div class="fileUpload btn btn-info" style="margin-left:-1%;margin-top:-1%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="bank_pass_book" name="bank_pass_book" type="file" class="upload" onchange="bankfilename(this.value);" />
<!-- <input id="bank_upload" style="width:127%;" class="form-control input-md" value="
     <?php echo $arr_search['response'][0]['pass_book_details'][0]['name']; ?>">
    <div class="fileUpload btn btn-info" style="margin-left:135%;margin-top:-21%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="bank_pass_book" name="bank_pass_book" style="margin-top: -22px;margin-left: 129px;" type="file" class="upload" onchange="bankfilename(this.value);" />  -->
 

<?php
  $url_img_download_4 = 'https://kyc-application.herokuapp.com/download/';
  $options_img_download_4 = array(
    'http' => array(
      'header'  => array(
                          'IMAGE-NAME: '.$arr_search['response'][0]['pass_book_details'][0]['name'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_img_download_4 = stream_context_create($options_img_download_4);
  $output_img_download_4 = file_get_contents($url_img_download_4, false,$context_img_download_4);
  /*echo $output_img_download;*/
  $arr_img_download_4 = json_decode($output_img_download_4,true);
  
?>
</div>
<br>
<button style="margin-left:75%;margin-top:-6%;" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=pass_book_details&link=<?php echo $arr_img_download_4[0]['url']; ?>">View</a>
</button>
</div>


<!-- Input Type : Number -->
<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="typenumber">No of Partners: </label>
  <div class="col-md-4">                     
     <input value="<?php echo $arr_search['response'][0]['organization_details']['no_of_partners'] ?>"  type="number" name="no_of_partners" min="1" max="5" value="2" id="no_of_partners">
  </div>
</div> -->

<!-- <div class="form-group col-md-4 ">
  <label class="col-md-4 control-label"><b> <font size="4">Partner1</font></b></label>

</div> -->




<!-- Added Partner 1 -->
<label for="comment" style="margin-left: 334px;font-size: 17px;"> Partner 1: </label>



<?php for($x=0;$x < count($arr_search['response'][0]['partner_details']); $x++){?>


<div class="present_fields">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name:</label>  

  <div class="col-md-4 col-sm-2 col-2">
  <input id="partner_names[]" value="<?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['name'] ?>" name="partner_names[]" type="text" placeholder="Enter Full Name" class="form-control input-md">
  </div>

  <div class="col-md-2 col-sm-2 col-2">
    <a href="new_user_popup.php" style="color:white" target="_blank" data-toggle="modal" data-target="#myModal">

     <button type="button" class="btn btn-info " style="margin-left:-6%">
       New Entry
     </button>
    </a>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="designation">Designation: </label>
  <div class="col-md-4">
    <select style="width:170px" id="partner_designations[]" name="partner_designations[]" class="form-control">
      <option value="<?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['designation'] ?>"><?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['designation'] ?></option>
      <option value="Managing Partner">Managing Partner</option>
      <option value="Manager">Manager</option>
      <option value="Other">Other</option>
    </select>
  </div>
  <div class="col-md-2">
     <input id="textinput" style="margin-left:-220px;width:165px" name="textinput" type="text" placeholder="Specify if Other" class="form-control input-md">
  </div>
</div>


 <a href="" style="" class="remove_field_present"><img src="images/del24.png" style="margin-left:890px;margin-top:-175px"></a>

</div>


<?php }?>

<div class="form-group">
<center>
<div class="col-md-2 col-sm-2 col-2">
    <div class="input_fields_wrap">
         <button class="add_field_button btn " onclick="incrementValue()" style="margin-left: 443px;">Add New Partners</button>
         <div>
         <input type="text" name="mytext[]" hidden="" ></div>
</div>
</div>
</div>
<br>


<?php for($q=0;$q<count($arr_search['response'][0]['add_info']);$q++){?>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Type of work:</label>
  <div class="col-md-4">
    <select id="type_of_work[]" name="type_of_work[]" class="form-control">
      <option value="<?php echo $arr_search['response'][0]['add_info'][$q]['type_of_work']; ?>"><?php echo $arr_search['response'][0]['add_info'][$q]['type_of_work']; ?></option>
      <option value="Option one">Option one</option>
      <option value="Option two">Option two</option>
      <option value="Option three">Option three</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Status:</label>
  <div class="col-md-4">
    <select id="status[]" name="status[]" class="form-control">
      <option value="<?php echo $arr_search['response'][0]['add_info'][$q]['status']; ?>"><?php echo $arr_search['response'][0]['add_info'][$q]['status']; ?></option>
      <option value="Pending">Pending</option>
      <option value="Work in process">Work in process</option>
      <option value="Completed">Completed</option>
    </select>
  </div>
</div>
<!--date-->
<div class="form-group row">
  <label for="example-date-input" class="col-2 col-form-label" style="margin-left:29.5%;">DATE:</label>
  <div class="col-10">
    <input class="form-control" id="date[]" name="date[]" value="<?php echo $arr_search['response'][0]['add_info'][$q]['date']; ?>" style="width:31%;margin-left:34.6%;margin-top:-2%;" type="text">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Comment:</label>  
  <div class="col-md-4">
  <input id="comment[]" name="comment[]" value="<?php echo $arr_search['response'][0]['add_info'][$q]['comment']; ?>" pattern="[a-zA-Z]{1,15}" maxlength="50" title="Maximum length is 50 characters" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<?php  }?>


<div class="form-group">

<div class="col-md-8 col-sm-12 col-24">
    <div class="input_fields" style="color:black">
         <button class="add_field btn " onclick="incrementValue()" style="margin-left: 443px;">Add</button>
         <div>
         <input type="text" name="mytextt[]" hidden="" ></div>
</div>
</div>
</div>


<!-- Buttons SAve and Cancel -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save_btn"></label>
  <div class="col-md-8">
    <button id="edit_btn" name="edit_btn" type="submit" class="btn btn-success" style="width: 10em;">Save</button><span><span></span></span>
    <button onclick="goBack()" class="btn btn-warning" style="width: 10em;"><a style="color:white" href="">Cancel</a></button>
  
  </div>
</div>



</fieldset>
</form>

<?php } else { ?>
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<!-- <legend><center><?php echo $arr_search['response'][0]['user_details']['name'] ?></center></legend> -->
<!--avatar upload-->


<?php
  $url_img = 'https://kyc-application.herokuapp.com/download/';
  $options_img= array(
    'http' => array(
      'header'  => array(
                          'IMAGE-NAME: '.$arr_search['response'][0]['image_details'][0]['name'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_img = stream_context_create($options_img);
  $output_img = file_get_contents($url_img, false,$context_img);
  /*echo $output_img_download;*/
  $arr_img = json_decode($output_img,true);
  /*echo $arr_img[0]['url'];*/
  
  
?>

<div style="margin-top:10%">
 <input type="hidden" value="<?php echo $arr_search['response'][0]['user_details']['pk'] ?>" name="org_id" id="org_id"></input>

<img class="profile-pic" style="margin-left:77%;position:absolute;z-index:2;" src="<?php echo $arr_img[0]['url']; ?>" />
<div class="upload-button" style="position:absolute;z-index:2;margin-left:79%;margin-top:13%;">
<input id="profile_pic"  name="profile_pic" class="input-file" type="file">Upload Image</input>
</div>


<input name="image" id="image" class="file-upload1" style="position:absolute;z-index:-2;margin-left:46%;margin-top:16%;" type="file">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">UID:</label>  
  <div class="col-md-4">
  <input id="uid" name="uid" type="text" value="<?php echo $arr_search['response'][0]['user_details']['uid'] ?>" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name:</label>  
  <div class="col-md-4">
  <input id="name" name="name" value="<?php echo $arr_search['response'][0]['user_details']['name'] ?>" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!--date-->
<div class="form-group row">
  <label for="example-date-input" class="col-2 col-form-label" style="margin-left:29.5%;">DOB:</label>
  <div class="col-10">
    <input class="form-control" id="date" name="date" value="<?php echo $arr_search['response'][0]['user_details']['date'] ?>" style="width:31%;margin-left:34.6%;margin-top:-2%;" type="date" value="" id="example-date-input">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Profession:</label>
  <div class="col-md-4">
    <select id="profession" name="profession" class="form-control">
      <option value="<?php echo $arr_search['response'][0]['user_details']['proffesion'] ?>"><?php echo $arr_search['response'][0]['user_details']['proffesion'] ?></option>
      <option value="Option one">Option one</option>
      <option value="Option two">Option two</option>
      <option value="Option three">Option three</option>
      <option value="Option four">Option four</option>
    </select>
  </div>
</div>

<!-- Text input-->
<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="specify " class="form-control input-md">
    
  </div>
</div> -->

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address" value="<?php echo $arr_search['response'][0]['user_details']['address'] ?>"><?php echo $arr_search['response'][0]['user_details']['address'] ?></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">PAN:</label>  
  <div class="col-md-4">
  <input pattern="-?[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}?" title="Must be of the form ARLPA0061H" id="pan" name="pan" value="<?php echo $arr_search['response'][0]['user_details']['pan'] ?>" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN card:</label>

<div class="col-md-4">
<?php echo $arr_search['response'][0]['pan_card_details'][0]['name']; ?>
</div>


<div class="col-md-4">
<input id="pan_card" name="pan_card" style="margin-left:-47%" value="<?php echo $_POST['pan_card'] ?>" class="input-file" type="file">
</div>

<div class="col-md-4">
<?php
  $url_img_download = 'https://kyc-application.herokuapp.com/download/';
  $options_img_download = array(
    'http' => array(
      'header'  => array(
                          'IMAGE-NAME: '.$arr_search['response'][0]['pan_card_details'][0]['name'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_img_download = stream_context_create($options_img_download);
  $output_img_download = file_get_contents($url_img_download, false,$context_img_download);
  /*echo $output_img_download;*/
  $arr_img_download = json_decode($output_img_download,true);
  
?>
<button style="background-color:#65AC4;margin-left:115%;margin-top:-13%" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=pan_card_details&link=<?php echo $arr_img_download[0]['url']; ?>">View</a>
</button>

</div>

</div>

<!--address proof-->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Address Proof</label>

<div class="col-md-1">
<label class="checkbox-inline" for="checkboxes-0">

<?php if($arr_search['response'][0]['telephone_bill_details'][0]['name'] != ''){
      $check_box_select1="checked";
    }else{
      $check_box_select1="";
    }?>

 <input <?php echo $check_box_select1 ?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Telephone</label>
</div>

<div class="col-md-4">
<?php echo $arr_search['response'][0]['telephone_bill_details'][0]['name']; ?>

<input id="telephone_bill"  value="<?php echo $_POST['telephone_bill'] ?>" style="margin-top: 3px;margin-left: 129px;position:absolute;" name="telephone_bill" class="input-file" type="file">     

<?php
  $url_img_download_2 = 'https://kyc-application.herokuapp.com/download/';
  $options_img_download_2 = array(
    'http' => array(
      'header'  => array(
                          'IMAGE-NAME: '.$arr_search['response'][0]['telephone_bill_details'][0]['name'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_img_download_2 = stream_context_create($options_img_download_2);
  $output_img_download_2 = file_get_contents($url_img_download_2, false,$context_img_download_2);
  /*echo $output_img_download;*/
  $arr_img_download_2 = json_decode($output_img_download_2,true);
  
?>

<button style="margin-left:88%" class="btn btn-success">

<a target="_blank" style="color:white" href="view_image.php?name=telephone_bill_details&link=<?php echo $arr_img_download_2[0]['url']; ?>">View</a>
</button>
</div>

</div>



    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-1">
   <label class="checkbox-inline" for="checkboxes-0">
   <?php if($arr_search['response'][0]['bank_pass_book_details'][0]['name'] != ''){
      $check_box_select2="checked";
    }else{
      $check_box_select2="";
    }?>
     <input <?php echo $check_box_select2 ?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Bank Passbook</label>

 </div>

 <div class="col-md-4">
<?php echo $arr_search['response'][0]['bank_pass_book_details'][0]['name']; ?>
</div>

<div class="col-md-4">
<input id="bank_pass_book"  value="<?php echo $_POST['bank_pass_book'] ?>" style="margin-top: 6px;margin-left: 129px;position:absolute;" name="bank_pass_book" class="input-file" type="file">     
 </div>

<div class="col-md-4">
<?php
  $url_img_download_3 = 'https://kyc-application.herokuapp.com/download/';
  $options_img_download_3= array(
    'http' => array(
      'header'  => array(
                          'IMAGE-NAME: '.$arr_search['response'][0]['bank_pass_book_details'][0]['name'],
                         ),
      'method'  => 'GET',
    ),
  );
  $context_img_download_3 = stream_context_create($options_img_download_3);
  $output_img_download_3 = file_get_contents($url_img_download_3, false,$context_img_download_3);
  /*echo $output_img_download;*/
  $arr_img_download_3 = json_decode($output_img_download_3,true);
  
?>

<button style="margin-left:88%" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=bank_pass_book_details&link=<?php echo $arr_img_download_3[0]['url']; ?>">View</a>
</button>

</div>

</div>

<!--ID pROOF-->

<!--address proof-->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">ID Proof</label>
  <div class="col-md-1">
   <label class="checkbox-inline" for="checkboxes-0">

   <?php if($arr_search['response'][0]['voter_id_details'][0]['name'] != ''){
      $check_box_select3="checked";
    }else{
      $check_box_select3="";
    }?>

     <input <?php echo $check_box_select3; ?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1">voter ID</label>
   </div>

    <div class="col-md-4">
    <?php echo $arr_search['response'][0]['voter_id_details'][0]['name']; ?>
  <input id="voter_id" value="<?php echo $_POST['voter_id'] ?>" style="margin-top:6px;margin-left: 129px;position: absolute;" name="voter_id" class="input-file" type="file">     
  <?php
    $url_img_download_4 = 'https://kyc-application.herokuapp.com/download/';
    $options_img_download_4= array(
      'http' => array(
        'header'  => array(
                            'IMAGE-NAME: '.$arr_search['response'][0]['voter_id_details'][0]['name'],
                           ),
        'method'  => 'GET',
      ),
    );
    $context_img_download_4 = stream_context_create($options_img_download_4);
    $output_img_download_4= file_get_contents($url_img_download_4, false,$context_img_download_4);
    /*echo $output_img_download;*/
    $arr_img_download_4 = json_decode($output_img_download_4,true);
    
  ?>

<button style="margin-left:88%" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=voter_id_details&link=<?php echo $arr_img_download_4[0]['url']; ?>">View</a>
</button>

  </div>

</div>


    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-1">
   <label class="checkbox-inline" for="checkboxes-0">
   <?php if($arr_search['response'][0]['passport_details'][0]['name'] != ''){
      $check_box_select4="checked";
    }else{
      $check_box_select4="";
    }?>
     <input <?php echo $check_box_select4; ?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Passport</label>
  </div>

   <div class="col-md-4">
  <?php echo $arr_search['response'][0]['passport_details'][0]['name']; ?>
  </div>

  <div class="col-sm-4">
  <input id="passport" value="<?php echo $_POST['passport'] ?>" style="margin-top:6px;margin-left: 129px;position:absolute" name="passport" class="input-file" type="file">     
   </div>

  <div class="col-md-4">
  <?php
    $url_img_download_5 = 'https://kyc-application.herokuapp.com/download/';
    $options_img_download_5= array(
      'http' => array(
        'header'  => array(
                            'IMAGE-NAME: '.$arr_search['response'][0]['passport_details'][0]['name'],
                           ),
        'method'  => 'GET',
      ),
    );
    $context_img_download_5 = stream_context_create($options_img_download_5);
    $output_img_download_5= file_get_contents($url_img_download_5, false,$context_img_download_5);
    /*echo $output_img_download;*/
    $arr_img_download_5 = json_decode($output_img_download_5,true);
    
  ?>

<button style="margin-left:88%;" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=passport_details&link=<?php echo $arr_img_download_5[0]['url']; ?>">View</a>
</button>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Adhar card No.</label>  
  <div class="col-md-4">
  <input id="aadhar_no" name="aadhar_no" value="<?php echo $arr_search['response'][0]['user_details']['aadhar_no'] ?>" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Adhar card:</label>

  <div class="col-md-4">
  <?php echo $arr_search['response'][0]['aadhar_card_details'][0]['name']; ?>
  </div>

  <div class="col-md-4">
    <input id="aadhar_card" name="aadhar_card"  style="margin-left:-47%" value="<?php echo $_POST['aadhar_card'] ?>" class="input-file" type="file">
  </div>
  
  <div class="col-md-4">
  <?php
    $url_img_download_6 = 'https://kyc-application.herokuapp.com/download/';
    $options_img_download_6= array(
      'http' => array(
        'header'  => array(
                            'IMAGE-NAME: '.$arr_search['response'][0]['aadhar_card_details'][0]['name'],
                           ),
        'method'  => 'GET',
      ),
    );
    $context_img_download_6 = stream_context_create($options_img_download_6);
    $output_img_download_6= file_get_contents($url_img_download_6, false,$context_img_download_6);
    /*echo $output_img_download;*/
    $arr_img_download_6 = json_decode($output_img_download_6,true);
    
  ?>
<button style="margin-left:117%;position:absoulte;margin-top:-12%" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=aadhar_card_details&link=<?php echo $arr_img_download_6[0]['url']; ?>">View</a>
</button>

  </div>

</div>

<?php for($q=0;$q<count($arr_search['response'][0]['add_info']);$q++){?>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Type of work</label>
  <div class="col-md-4">
    <select id="type_of_work[]" name="type_of_work[]" class="form-control">
      <option value="<?php echo $arr_search['response'][0]['add_info'][$q]['type_of_work']; ?>"><?php echo $arr_search['response'][0]['add_info'][$q]['type_of_work']; ?></option>
      <option value="Option one">Option one</option>
      <option value="Option two">Option two</option>
      <option value="Option three">Option three</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Status</label>
  <div class="col-md-4">
    <select id="status[]" name="status[]" class="form-control">
      <option value="<?php echo $arr_search['response'][0]['add_info'][$q]['status']; ?>"><?php echo $arr_search['response'][0]['add_info'][$q]['status']; ?></option>
      <option value="Pending">Pending</option>
      <option value="Work in process">Work in process</option>
      <option value="Completed">Completed</option>
    </select>
  </div>
</div>
<!--date-->
<div class="form-group row">
  <label for="example-date-input" class="col-2 col-form-label" style="margin-left:29.5%;">D:</label>
  <div class="col-10">
    <input class="form-control" id="date[]" name="date[]" value="<?php echo $arr_search['response'][0]['add_info'][$q]['date']; ?>" style="width:31%;margin-left:34.6%;margin-top:-2%;" type="text">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Comment</label>  
  <div class="col-md-4">
  <input id="comment[]" name="comment[]" value="<?php echo $arr_search['response'][0]['add_info'][$q]['comment']; ?>" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<?php  }?>

<div class="form-group">

<div class="col-md-8 col-sm-12 col-24">
    <div class="input_fields" style="color:black">
         <button class="add_field btn " onclick="incrementValue()" style="margin-left: 443px;">Add</button>
         <div>
         <input type="text" name="mytextt[]" hidden="" ></div>
</div>
</div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="edit_btn" name="edit_btn" type="submit" class="btn btn-success" style="width: 10em;">Save</button><span><span></span></span>
    <button onclick="goBack()" class="btn btn-warning"><a style="color:white" href="">Cancel</a></button>
  </div>
</div>

</fieldset>
</form>

<?php } ?>

<script type="text/javascript">
$(function(){

$('#trigger').click(function(){
  $('#myModal').modal('show');
  return false;
})

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

<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  
<script type="text/javascript">
      
      $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var wrapper_present         = $(".present_fields"); //Fields wrapper
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).prepend('<br><div style="margin-left:50px;"><center><div class="form-group"> <label class=" control-label" for="textinput" style="margin-left:327px;">Name: </label> <div > <input id="partner_names[]" name="partner_names[]" type="text" placeholder="Enter Full Name" class="form-control input-md editentry" style="margin-top: -25px;margin-left: 403px;width: 241%;">  </div>  <div class="col-md-6" > <a href="new_user_popup.php" style="color:white" target="_blank" data-toggle="modal" data-target="#myModal"><button  type="button" class="btn btn-info" style="margin-left: 809px;margin-top: -61px;">New Entry</button> </a> </div></div> <div class="form-group">  <label class="control-label" for="selectbasic" style="margin-left:293px;">Designation: </label>  <div> <select id="partner_designations[]" name="partner_designations[]" class="form-control" style="margin-left: 405px;margin-top: -34px;width:118%;">      <option value="Managing Partner">Managing Partner</option>      <option value="Manager">Manager</option>      <option value="Other">Other</option>    </select>  </div>  <div>  <input style="margin-left: 617px;margin-top: -35px;width:114%" id="textinput" name="textinput" type="text" placeholder="Specify if Other" class="form-control input-md"></div></div></center><a href="#" class="remove_field"><img src="images/del24.png" style="margin-left: 810px; margin-top: -81px;"></a></a></div>'); //add input box\
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

    $(wrapper_present).on("click",".remove_field_present", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
    </script>

<script>
function goBack() {
    window.history.back();
}
</script>

<script type="text/javascript">


     $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields"); //Fields wrapper
    var add_button      = $(".add_field"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).prepend('<br><div style="margin-left:50%;"><div class="form-group"><label class="control-label" for="selectbasic" style="margin-left:-325px;">Type of work</label><div class="col-md-6"><select id="type_of_work[]" name="type_of_work[]" class="form-control" style="margin-left:9%;width:208%"><option value="Option one">Option one</option><option value="Option two">Option two</option><option value="Option three">Option three</option></select></div></div><div class="form-group"> <label class="col-md-4 control-label" for="selectbasic" style="margin-left:-29%">Status</label><div class="col-md-6"><select id="status[]" name="status[]" style="width:210%;margin-left:-1%;" class="form-control"><option value="Pending">Pending</option><option value="Work in process">Work in process</option><option value="Completed">Completed</option></select></div></div><div class="form-group row"><label for="example-date-input" class="col-2 col-form-label" style="margin-left:-8.5%;";">DATE</label><div class="col-10"><input class="form-control" id="date[]" name="date[]" style="width:91%;margin-left:6.6%;margin-top:-6%;" type="text"></div></div><div class="form-group"><label class="col-md-4 control-label" for="textinput" style="margin-left:-29%">Comment</label><div class="col-md-4"><input id="comment[]" name="comment[]" type="text" placeholder="" class="form-control input-md" style="width:342%"></div></div></center><a href="#" class="remove_field"><img src="images/del24.png" style="margin-left: 443px; margin-top: -81px;"></a></a></div>'); //add input box\
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

    </script>

    <!-- AutoSearch Script files don't move -->
     <script type="text/javascript" src="autocomplete-Files/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="autocomplete-Files/jquery.mockjax.js"></script>
        <script type="text/javascript" src="autocomplete-Files/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="autocomplete-Files/EditEntryValues.js"></script>
        <script type="text/javascript" src="autocomplete-Files/Logic_EditEntry.js"></script>

</body>
</html>


<?php

$db = pg_connect("host=ec2-107-20-191-76.compute-1.amazonaws.com port=5432 dbname=deu9vahl80fvjn user=vdvqpruzihrics password=17b3e7a56da97ca021e3da54bb1694bb799849a2b5911014ed6caa05e1e4e02d");
 pg_select($db, 'post_log', $_POST);
 

 $query=pg_query("SELECT id,name FROM users_users");

 $json=array();

while ($student = pg_fetch_array($query)) {
    $json[$student["id"]] = $student["name"];
}

$textval = json_encode($json);
$foo = "var partnames=" . $textval;
file_put_contents('autocomplete-Files/EditEntryValues.js', $foo);
?>
