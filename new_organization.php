<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- <link rel="stylesheet" type="text/css" href="css/material.indigo-pink.min.css"> -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="css/material.css">
    <!-- Material Design icon font -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    </style>
  </head>

<body style="background-color:#E8E8E8;overflow-x:hidden;">
  <style type="text/css">
    span:before{
    content:" "; 
    display:inline-block; 
    width:32px;
}

  </style>
</head>
<body  style="overflow-y: scroll;" >

<?php

if(isset($_POST["save_btn"])) {

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
                          ),
      'method'  => 'GET',
    ),
  );
  $context_org = stream_context_create($options_org);
  $output_org = file_get_contents($url_org, false,$context_org);
  $arr_org = json_decode($output_org,true);

  if($arr_org['status']==200){
    echo "<script>alert('New Organization Created')</script>";
    $_POST = array();
  }
}
?>



<div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#08426a;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" >

        <img style="margin-top:5%;margin-left:28px;" src="images/Different-Honda-Logo.png"></img>
<h5 style="margin-left:35%;margin-top:9%;">New Entry Organization</h5>
         <span class="mdl-layout-title" style="margin-left:26%;margin-top:7%;">KYChome</span>
          <!-- Add spacer, to align navigation to the right -->
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="">Home</a>
          <a class="mdl-navigation__link" href="">New Entry Organization</a>
          <a class="mdl-navigation__link" href="">New Entry Individual</a>
          <a class="mdl-navigation__link" href="">Missing Reports</a>
          <a class="mdl-navigation__link" href="">Admin</a>
          <a class="mdl-navigation__link" href="">Help</a>
          <a class="mdl-navigation__link" href="">About Us</a>
          <a class="mdl-navigation__link" href="">Contact</a>
        </nav>
      </div>
        </div>
      </header>
<form class="form-horizontal" method="post" action="new_organization.php" enctype="multipart/form-data">

<fieldset>

<!-- Form Name -->
<!-- <legend>CA Database</legend>
 -->

<!-- Select Basic -->
<div class="form-group" style="margin-top:12%;">
  <label class="col-md-4 control-label" for="type_of_org">Type of Organization</label>
  <div class="col-md-4">
    <select id="type_of_org" name="type_of_org" class="form-control">
      <option value="Partnership">Partnership</option>
      <option value="Individual">Individual</option>
    </select>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textname">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Enter Name" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="registration">Registration</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="registration" id="radios-0" value="1" checked="checked">
      Registered
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="registration" id="radios-1" value="0">
      Un-Registered
    </label>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
<label class="col-md-4 control-label" for="reg_certificate">Registration Certificate</label>
  <div class="col-md-4">
    <input id="reg_certificate" name="reg_certificate" type="file"/>
</div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">PAN </label>  
  <div class="col-md-4">
  <input id="pan" name="pan" type="text" placeholder="PAN Card Number" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN Card</label>
  <div class="col-md-4">
    <input id="pan_card" name="pan_card" type="file">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address">Enter Address</textarea>
  </div>
</div>

<!-- Multiple Checkboxes  and File upload Button -->   

    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Telephone</label>
<input id="telephone_bill" style="margin-top: -20px;margin-left: 129px;" name="telephone_bill" class="input-file" type="file">     
 </div>
</div>



    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Bank Passbook</label>
<input id="bank_pass_book" style="margin-top: -22px;margin-left: 129px;" name="bank_pass_book" class="input-file" type="file">     
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
<label for="comment" id="number" style="margin-left: 334px;font-size: 18px;"> Partners : </label>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name: </label>  
  <div class="col-md-2 col-sm-2 col-2">
  <input id="partner_names[]" name="partner_names[]" type="text" placeholder="Enter Full Name" class="form-control input-md" style="width: 167px;">
  </div>
  <div class="col-md-2 col-sm-2 col-2">
    <button id="singlebutton" name="singlebutton" class="btn btn-info "><a href="new_user.php" style="color:white" target="_blank">New Entry</a></button>
  </div>
</div>


<!-- Select Basic-->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Designation: </label>
  <div class="col-md-4">
    <select id="partner_designations[]" name="partner_designations[]" class="form-control" style="width: 166px;">
      <option value="1">Managing Partner</option>
      <option value="2">Manager</option>
      <option value="3">Other</option>
    </select>
  </div>
  <div class="col-md-2">
     <input id="textinput" name="textinput" type="text" placeholder="Specify if Other" class="form-control input-md"  style="margin-left:-221px;">
</div>

</div> 

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
<br

<!-- Buttons SAve and Cancel -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save_btn"></label>
  <div class="col-md-8">
    <button id="save_btn" name="save_btn" type="submit" class="btn btn-success" style="width: 10em;">Save</button><span><span></span></span>
    <button onclick="ClickEvent()" class="btn btn-warning"><a style="color:white" href="search.php">Cancel</a></button>
  
  </div>
</div>
</fieldset>
</form>
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  
<script type="text/javascript">
      
      $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<br><div style="margin-left:50px;"><center><div class="form-group"> <label class=" control-label" for="textinput" style="margin-left:327px;">Name: </label> <div > <input id="partner_names[]" name="partner_names[]" type="text" placeholder="Enter Full Name" class="form-control input-md" style="margin-top: -25px;margin-left: 403px;">  </div>  <div class="col-md-6" > <button id="singlebutton" name="singlebutton" class="btn btn-info " style="margin-left: 613px;margin-top: -62px;"><a href="new_user.php" style="color:white" target="_blank">New Entry</a></button>  </div></div> <div class="form-group">  <label class="control-label" for="selectbasic" style="margin-left:293px;">Designation: </label>  <div> <select id="partner_designations[]" name="partner_designations[]" class="form-control" style="margin-left: 405px;margin-top: -34px;">      <option value="Managing Partner">Managing Partner</option>      <option value="Manager">Manager</option>      <option value="Other">Other</option>    </select>  </div>  <div>  <input style="margin-left: 629px;margin-top: -35px;" id="textinput" name="textinput" type="text" placeholder="Specify if Other" class="form-control input-md"></div></div></center><a href="#" class="remove_field"><img src="images/del24.png" style="margin-left: 810px; margin-top: -81px;"></a></a></div>'); //add input box\
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
    </script>
<!-- <script type="text/javascript">
  
  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".form-group"); //Fields wrapper
    var add_partner     = $(".add_new_partner"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_partner).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
 -->
</body>
</html>



