<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- <link rel="stylesheet" type="text/css" href="css/material.indigo-pink.min.css"> -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="autocomplete-Files/styles.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="css/material.css">
        <link rel="stylesheet" href="css/fileupload.css">
    <link rel="stylesheet" href="css/fileupload.css">
     <link rel="stylesheet" href="autocomplete-Files/styles.css">
    <!-- Material Design icon font -->

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

     <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <style type="text/css">
    span:before{
    content:" "; 
    display:inline-block; 
    width:32px;}

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
    border: 1px solid black;
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
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    /*position: relative;*/
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
  </style>

<script>

function proceed(){

var a=document.forms["Form"]["uid"].value;
if(a==null || a==''){
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( var i=0; i < 7; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        var mystring= (document.getElementById('name').value).substring(0, 3);
        var uid_gen=mystring+text;
        document.getElementById('uid').value = uid_gen;
        document.getElementById('uid_in_popup').value = uid_gen;

        /*alert("UID generated: "+uid_gen);*/
        var yourUl = document.getElementById("popup1");
        yourUl.style.display = yourUl.style.display === 'none' ? '' : 'none';
        return false;
}
}
</script>

</head>

<body style="background-color:#E8E8E8;overflow-x:hidden;">


<script type="text/javascript">
  function submit_form(){
    $('#Form').submit();
  }
</script>

<script type="text/javascript">
    function make_uid_null(){
    
    $('#uid').val("");
    document.getElementById("popup1").style.display='none';
    /*alert("helo");*/
  }
</script>


<?php

if(isset($_POST["save_btn"]) and $_GET["is_user"]==0) {

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
        $reg_certificate_id="";
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
        $pan_card_id="";
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
        $pass_book_id="";
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
        $telephone_bill_id="";
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

  $url_org = 'https://kyc-application.herokuapp.com/add_new_organization/';
  $options_org = array(
    'http' => array(
      'header'  => array(
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

  if($arr_org['status']==200){
    /*echo "<script>alert('New Organization Created')</script>";*/
    $_POST = array();
  }
}
?>

<?php

if ($_POST['uid'] != '' and $_GET["is_user"]==1){

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
        $pan_card_id="";
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
        $voter_card_id="";
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
        $pass_book_id="";
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
        $telephone_bill_id="";
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
        $aadhar_card_id="";
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
        $passport_id="";
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
        $image_id="";
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

  $url_org = 'https://kyc-application.herokuapp.com/add_new_individual/';
  $options_org = array(
    'http' => array(
      'header'  => array(
                          'UID: '.$_POST['uid'],
                          'NAME: '.$_POST['name'],
                          'DOB: '.$_POST['date1'],
                          'PROFFESION: '.$_POST['profession'],
                          'PAN: '.$_POST['pan'],
                          'PAN-CARD: '.$pan_card_id,
                          'ADDRESS: '.$_POST['address'],
                          'TELEPHONE-BILL: '.$telephone_bill_id,
                          'BANK-PASS-BOOK: '.$pass_book_id,
                          'VOTER-ID: '.$voter_card_id,
                          'PASSPORT: '.$passport_id,
                          'AADHAR-NO: '.$aadhar_no,
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
    /*echo "<script>alert('New Individual Created')</script>";*/
    $_POST = array();
  }
}
?>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header style="background-color:#08426a;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" >

    <img style="margin-top:5%;margin-left:28px;width:50px;height:50px" src="images/green.png"></img>

    <?php if ($_GET['is_user']==0) { 
           $title="New Entry Organization";
      }else {
           $title="New Entry Individual"; 
      }?>
    <h5 style="margin-left:35%;margin-top:9%;"><?php echo $title; ?></h5>
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





<!-- Form Name -->
<!-- <legend>CA Database</legend>
 -->
<?php if ($_GET['is_user']==0) { ?>

<form class="form-horizontal" method="post" action="new.php?is_user=0" enctype="multipart/form-data">

<fieldset>
<!-- Select Basic -->
<div class="form-group" style="margin-top:12%;">
  <label class="col-md-4 control-label" for="type_of_org">Type of Organization:</label>
  <div class="col-md-4">
    <select id="type_of_org" name="type_of_org" class="form-control">
      <option value="Partnership">Partnership</option>
      <option value="Individual">Individual</option>
    </select>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textname">Name:</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Enter Name" class="form-control input-md" required/>
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="registration">Registration:</label>
  <div class="col-md-4"> 
    <label class="mdl-radio mdl-js-radio" for="radios-0">
      <input type="radio" name="registration" id="radios-0" value="1" class="mdl-radio__button" checked="checked" onChange="disablefield();">
      Registered
    </label> 
    <label class="mdl-radio mdl-js-radio" for="radios-1">
      <input type="radio" name="registration" id="radios-1" value="0" class="mdl-radio__button" onChange="disablefield();">
      Un-Registered
    </label>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
<label class="col-md-4 control-label" for="reg_certificate">Registration Certificate:</label>
  <div class="col-md-4">
    <input id="uploadFile" placeholder="Choose File" class="form-control input-md"/>
    <div class="fileUpload btn btn-info" style="margin-left:105%;margin-top:-12%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="reg_certificate" name="reg_certificate" type="file" class="upload" onchange="setfilename(this.value);" />
</div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">PAN: </label>  
  <div class="col-md-4">
  <input id="pan" pattern="-?[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}?" title="Must be of the form ARLPA0061H" name="pan" type="text" placeholder="PAN Card Number" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN Card:</label>
  <div class="col-md-4">
    <input id="pan_upload" placeholder="Choose File" class="form-control input-md"/>
    <div class="fileUpload btn btn-info" style="margin-left:105%;margin-top:-12%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="pan_card" name="pan_card" type="file" class="upload" onchange="panfilename(this.value);" />
  </div>
</div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address">Enter Address</textarea>
  </div>
</div>

<!-- Multiple Checkboxes  and File upload Button -->   

    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes">Address Proof:</label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">

    <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1" onchange="document.getElementById('telephone_bill').disabled = !this.checked;" >Telephone</label>
     <div id="telephone_upload" style="width:68%;margin-left:32%;margin-top:-5%"/>
    <div class="fileUpload btn btn-info" style="margin-left:107%;margin-top:-6%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="telephone_bill" name="telephone_bill" type="file" class="upload" onchange="telefilename(this.value);" /> 
 </div>
</div>
</div>


<div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4" style="margin-left:33.5%;margin-top:1%">
   <label class="checkbox-inline" for="checkboxes-0" >
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1" onchange="document.getElementById('bank_pass_book').disabled = !this.checked;">Bank Passbook</label>
     <div id="bank_upload" style="width:68%;margin-left:32%;margin-top:0%"/>
    <div class="fileUpload btn btn-info" style="margin-left:105%;margin-top:-12%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="bank_pass_book" name="bank_pass_book" type="file" class="upload" onchange="bankfilename(this.value);" />     
 </div>
</div>
</div>
</div>

<!-- Input Type : Number -->
<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="typenumber">No of Partners: </label>
  <div class="col-md-4">                     
     <input type="number" name="no_of_partners" min="1" max="5" value="2" id="no_of_partners">
  </div>
</div> -->

<!-- <div class="form-group col-md-4 ">
  <label class="col-md-4 control-label"><b> <font size="4">Partner1</font></b></label>

</div> -->
<!-- Added Partner 1 -->

<label for="comment" id="number" style="margin-left:25%;margin-top:0%;font-size: 16px;font-weight:600;"> PARTNERS : </label>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name: </label>  
  <div class="col-md-4 col-sm-2 col-2">
  <input id="partner_names[]" name="partner_names[]" type="text" placeholder="Enter Full Name" class="form-control input-md newentry" style="width: 100%;">
  </div>

  <div class="col-md-2 col-sm-2 col-2">

    <a href="new_user_popup.php" style="color:white" target="_blank" data-toggle="modal" data-target="#myModal">

     <button type="button" class="btn btn-info " style="margin-left:-6%">
       New Entry
     </button>
    </a>
  </div>
</div>


<!-- Select Basic-->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Designation: </label>
  <div class="col-md-4">
    <select id="partner_designations[]" name="partner_designations[]" class="form-control" style="width: 49%;">
      <option value="1">Managing Partner</option>
      <option value="2">Manager</option>
      <option value="3">Other</option>
    </select>
  </div>

  <div class="col-md-2">
     <input id="textinput" name="textinput" type="text" placeholder="Specify if Other" class="form-control input-md"  style="margin-left:-221px;width:103%;">
</div>
</div> 

<div class="form-group">
<div class="col-md-2 col-sm-2 col-2">
    <div class="input_fields_wrap" style="color:black">
         <button class="add_field_button btn " onclick="incrementValue()" style="margin-left: 443px;">Add New Partners</button>
         <input type="text" name="mytext[]" hidden="" ></div>
</div>
  </div>

<div class="present_fields_1">
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Type of work</label>
  <div class="col-md-4">
    <select id="type_of_work[]" name="type_of_work[]" class="form-control">
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
      <option value="Pending">Pending</option>
      <option value="Work in process">Work in process</option>
      <option value="Completed">Completed</option>
    </select>
  </div>
</div>
<!--date-->
  <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">DATE</label>  
  <div class="col-md-4">
  <input id="date[]" name="date[]" value="<?php echo $_POST['date'] ?>" style="width:100%;margin-left:-0.4%;margin-top:0%;" type="Text" value="" id="example-date-input" type="text" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Comment</label>  
  <div class="col-md-4">
  <input id="comment[]" name="comment[]" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<a href="#" class="remove_field_pre1">
 <img src="images/del24.png" style="margin-left: 900px; margin-top: -81px;">
</a>

</div>

<div class="form-group">

<div class="col-md-8 col-sm-12 col-24">
    <div class="input_fields" style="color:black">
         <button class="add_field btn " onclick="incrementValue()" style="margin-left: 443px;">Add More</button>
         <div>
         <input type="text" name="mytextt[]" hidden="" ></div>
</div>
</div>
</div>

<!-- Buttons SAve and Cancel -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save_btn"></label>
  <div class="col-md-8">
    <button id="save_btn" name="save_btn" type="submit" class="btn btn-success" style="width: 10em;margin-left:10px">Save</button><span><span></span></span>
    <button onclick="ClickEvent()" class="btn btn-warning" style="width: 10em;"><a style="color:white" href="search.php">Cancel</a></button>
  
  </div>
</div>
</fieldset>
</form>

<?php } else { ?>


<!-- <p>Click on the "x" symbol to close the alert message.</p> -->
<div class="alert" id="popup1" class="popup1" style="display:none;text-align:center;position:absolute;
    width:100%;
    top: 70%;z-index:2">
 <!--  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> -->
 <!--  <form method="post" action="new.php">  -->
  <label>UID Generated</label><br>
  <input type="text" id="uid_in_popup" name="uid_in_popup" style="background-color:transparent;color:black;border:none"></input><br><br>
  <button id="done" class="btn btn-success" name="done" onclick="submit_form()">Done</button>
  <button onclick="make_uid_null()" id="cancel1" class="btn btn-warning" name="cancel1">Cancel</button>
  <!-- </form> -->
</div>


<form onsubmit="return proceed();" name="Form" id="Form" class="form-horizontal" method="post" action="new.php?is_user=1" enctype="multipart/form-data">
<fieldset>

<div style="margin-top:12%">
<img class="profile-pic" style="margin-left:77%;position:absolute;z-index:2;" src="images/boy-512.png" />

<div class="upload-button" style="position:absolute;z-index:2;margin-left:79%;cursor:pointer;margin-top:14%;">Upload Image</div>

<input name="image" id="image" class="file-upload1" style="position:absolute;z-index:-2;margin-left:46%;margin-top:16%;" type="file">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput" >UID:</label>  
  <div class="col-md-4">
  <input id="uid" name="uid" type="text" value="<?php echo $_POST['uid'] ?>" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name:</label>  
  <div class="col-md-4">
  <input id="name" name="name" value="<?php echo $_POST['name'] ?>" type="text" placeholder="" class="form-control input-md" required>
    
  </div>
</div>
<!--date-->
<div class="form-group row">
  <label for="example-date-input" class="col-2 col-form-label" style="margin-left:29.5%;">DOB:</label>
  <div class="col-10">
    <input class="form-control" id="date1" name="date1" value="<?php echo $_POST['date'] ?>" style="width:31%;margin-left:34.6%;margin-top:-2%;" type="text">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Profession:</label>
  <div class="col-md-4">
    <select id="profession" name="profession" class="form-control">
      <option value="Option one"><?php echo $_POST['profession'] ?></option>
      <option value="Option one">Option one</option>
      <option value="Option two">Option two</option>
      <option value="Option three">Option three</option>
      <option value="Option four">Option four</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="specify " class="form-control input-md" >
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address" value="<?php echo $_POST['address'] ?>">default text</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">PAN:</label>  
  <div class="col-md-4">
  <input pattern="-?[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}?" title="Must be of the form ARLPA0061H" id="pan" name="pan" value="<?php echo $_POST['pan'] ?>" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN card:</label>
  <div class="col-md-4">
    <input id="pan_card" name="pan_card" value="<?php echo $_POST['pan_card'] ?>" class="input-file" type="file">
  </div>
</div>

<!--address proof-->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Address Proof</label>
  <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Telephone</label>
<input id="telephone_bill"  value="<?php echo $_POST['telephone_bill'] ?>" style="margin-top: -20px;margin-left: 129px;" name="telephone_bill" class="input-file" type="file">     
 </div>
</div>


    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Bank Passbook</label>
<input id="bank_pass_book"  value="<?php echo $_POST['bank_pass_book'] ?>" style="margin-top: -22px;margin-left: 129px;" name="bank_pass_book" class="input-file" type="file">     
 </div>
</div>

<!--ID pROOF-->

<!--address proof-->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">ID Proof</label>
  <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">voter ID</label>
<input id="voter_id" value="<?php echo $_POST['voter_id'] ?>" style="margin-top: -20px;margin-left: 129px;" name="voter_id" class="input-file" type="file">     
 </div>
</div>


    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Passport</label>
<input id="passport" value="<?php echo $_POST['passport'] ?>" style="margin-top: -22px;margin-left: 129px;" name="passport" class="input-file" type="file">     
 </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Adhar card No.</label>  
  <div class="col-md-4">
  <input id="aadhar_no" name="aadhar_no" value="<?php echo $_POST['aadhar_no'] ?>" type="text" placeholder="" class="form-control input-md" >
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Adhar card:</label>
  <div class="col-md-4">
    <input id="aadhar_card" name="aadhar_card" value="<?php echo $_POST['aadhar_card'] ?>" class="input-file" type="file">
  </div>
</div>

<div class="present_fields_1">
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Type of work</label>
  <div class="col-md-4">
    <select id="type_of_work[]" name="type_of_work[]" class="form-control">
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
      <option value="Pending">Pending</option>
      <option value="Work in process">Work in process</option>
      <option value="Completed">Completed</option>
    </select>
  </div>
</div>
<!--date-->
<div class="form-group row">
  <label for="example-date-input" class="col-2 col-form-label" style="margin-left:29.5%;">DATE</label>
  <div class="col-10">
    <input class="form-control" id="date[]" name="date[]" value="<?php echo $_POST['date'] ?>" style="width:31%;margin-left:34.6%;margin-top:-2%;" type="date" value="" id="example-date-input">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Comment</label>  
  <div class="col-md-4">
  <input id="comment[]" name="comment[]" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<a href="#" class="remove_field_pre1">
 <img src="images/del24.png" style="margin-left: 900px; margin-top: -81px;">
</a>

</div>

<div class="form-group">

<div class="col-md-8 col-sm-12 col-24">
    <div class="input_fields" style="color:black">
         <button class="add_field btn " onclick="incrementValue()" style="margin-left: 443px;">Add More</button>
         <div>
         <input type="text" name="mytextt[]" hidden="" ></div>
</div>
</div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="generate_btn" name="generate_btn" type="submit">Generate</button>
    <button id="singlebutton" style="margin-left:13%;" name="singlebutton" class="btn btn-primary"><a style="color:white" href="search.php">Discard</a></button>
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

  <script type="text/javascript">


     $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields"); //Fields wrapper
    var add_button      = $(".add_field"); //Add button ID

    var wrapper_pre1         = $(".present_fields_1"); //Fields wrapper
    
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

    $(wrapper_pre1).on("click",".remove_field_pre1", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

 <!-- AutoSearch Script files don't move -->
     <script type="text/javascript" src="autocomplete-Files/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="autocomplete-Files/jquery.mockjax.js"></script>
        <script type="text/javascript" src="autocomplete-Files/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="autocomplete-Files/NewEntryValues.js"></script>
        <script type="text/javascript" src="autocomplete-Files/Logic_NewEntry.js"></script>
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
file_put_contents('autocomplete-Files/NewEntryValues.js', $foo);
 

?>
