<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/material.indigo-pink.min.css">
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
$url_search = 'https://kyc-application.herokuapp.com/search/';
$options_search = array(
  'http' => array(
    'header'  => array(
                  'TEXT: '.$_POST['name'],
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

if(isset($_POST["edit_btn"])) {

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
                          ),
      'method'  => 'GET',
    ),
  );
  $context_org = stream_context_create($options_org);
  $output_org = file_get_contents($url_org, false,$context_org);
  $arr_org = json_decode($output_org,true);

  if($arr_org['status']==200){
    /*echo "<script>alert('Organization Updated')</script>";*/
    
    $string1="<script>window.location.href='search_organization.php?text=".$arr_org['name']."'</script>";
    echo $string1;
  }
}
?>


<form class="form-horizontal" method="post" action="edit_organization.php" enctype="multipart/form-data">

<fieldset>

<!-- Form Name -->
<!-- <legend>CA Database</legend>
 --><h4><center><?php echo $arr_search['response'][0]['organization_details']['name'] ?></center></h4>


 <input type="hidden" value="<?php echo $arr_search['response'][0]['organization_details']['pk'] ?>" name="org_id" id="org_id"></input>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="type_of_org">Type of Organization</label>
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
  <label class="col-md-4 control-label" for="textname">Name</label>  
  <div class="col-md-4">
  <input value="<?php echo $arr_search['response'][0]['organization_details']['name'];?>" id="name" name="name" type="text" placeholder="Enter Name" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="registration">Registration</label>
  <div class="col-md-4"> 
    

<?php if($arr_search['response'][0]['organization_details']['registration'] == 1 ){
	$checked1="checked";
	$checked2="";
}if($arr_search['response'][0]['organization_details']['registration'] == 0 ){
	$checked1="";
	$checked2="checked";
}
?>
    <label class="radio-inline" for="radios-0"> 
      <input type="radio" name="registration" id="radios-0" value="1" checked="<?php echo $checked1; ?>">
      Registered
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="registration" id="radios-1" value="0" checked="<?php echo $checked2; ?>">
      Un-Registered
    </label>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="reg_certificate">Registration Certificate</label>

<div class="col-md-4">
<?php echo $arr_search['response'][0]['reg_certificate_details'][0]['name']; ?>
</div>
  <div class="col-md-4">
    <input id="reg_certificate" name="reg_certificate" type="file">
  </div>

<div class="col-md-4">
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
<button>
<a target="_blank" href="<?php echo $arr_img_download[0]['url']; ?>">View</a>
</button>

</div>

</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">PAN </label>  
  <div class="col-md-4">
  <input id="pan" name="pan" value="<?php echo $arr_search['response'][0]['organization_details']['pan'] ?>" type="text" placeholder="PAN Card Number" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN Card</label>
<div class="col-md-4">
 <?php echo $arr_search['response'][0]['pan_card_details'][0]['name']; ?>
</div>
  <div class="col-md-4">
    <input id="pan_card" name="pan_card" type="file">
  </div>

<div class="col-md-4">
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
<button>
<a target="_blank"  href=<?php echo $arr_img_download_2[0]['url']; ?>>View</a>
</button>
</div>

</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address"><?php echo $arr_search['response'][0]['organization_details']['address'] ?></textarea>
  </div>
</div>

<!-- Multiple Checkboxes  and File upload Button -->   

<div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
  <div class="col-md-3">
    <?php if($arr_search['response'][0]['telephone_bill_details'][0]['name'] != ''){
   		$check_box_select1="checked";
    }else{
    	$check_box_select1="";
    }?>
     <input <?php echo $check_box_select1;?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Telephone</label>
    
  </div>
<div class="col-md-3">
     <?php echo $arr_search['response'][0]['telephone_bill_details'][0]['name']; ?>
</div>



<div class="col-md-3">
<input id="telephone_bill" value="<?php echo $arr_search['response'][0]['organization_details']['telephone'] ?>" style="margin-top: -20px;margin-left: 129px;" name="telephone_bill" class="input-file" type="file">  
</div> 

<div class="col-md-4">
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
<button>
<a target="_blank"  href=<?php echo $arr_img_download_3[0]['url']; ?>>View</a>
</button>
</div> 


</div>
</div>



<div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">

<div class="col-md-3">
     <?php if($arr_search['response'][0]['pass_book_details'][0]['name'] != ''){
   		$check_box_select2="checked";
   		
     }else{
    	$check_box_select2="";
    }?>
     <input <?php echo $check_box_select2;?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Bank Passbook</label>
</div>
<div class="col-md-3"> 
     <?php echo $arr_search['response'][0]['pass_book_details'][0]['name']; ?>
</div>
<div class="col-md-3">
    <input id="bank_pass_book" style="margin-top: -22px;margin-left: 129px;" name="bank_pass_book" class="input-file" type="file"> 
</div>

<div class="col-md-4">
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
<button>
<a target="_blank" href=<?php echo $arr_img_download_4[0]['url']; ?>>View</a>
</button>
</div>

 </div>
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

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name</label>  
  <div class="col-md-2 col-sm-2 col-2">
  <input id="partner_names[]" value="<?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['name'] ?>" name="partner_names[]" type="text" placeholder="Enter Full Name" class="form-control input-md">
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="designation">Designation: </label>
  <div class="col-md-4">
    <select id="partner_designations[]" name="partner_designations[]" class="form-control">
 <option value="<?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['designation'] ?>"><?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['designation'] ?></option>
      <option value="Managing Partner">Managing Partner</option>
      <option value="Manager">Manager</option>
      <option value="Other">Other</option>
    </select>
  </div>
  <div class="col-md-2">
     <input id="textinput" name="textinput" type="text" placeholder="Specify if Other" class="form-control input-md">
  </div>

</div>

<?php }?>




<!-- Buttons SAve and Cancel -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save_btn"></label>
  <div class="col-md-8">
    <button id="edit_btn" name="edit_btn" type="submit" class="btn btn-success" style="width: 10em;">Save</button><span><span></span></span>
    <button onclick="goBack()" class="btn btn-warning"><a style="color:white" href="">Cancel</a></button>
  
  </div>
</div>
</fieldset>
</form>
<script>
function goBack() {
    window.history.back();
}
</script>

</body>
</html>



