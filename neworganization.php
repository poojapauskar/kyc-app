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

if(isset($_POST["save_btn"])) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $names=array();
        $names[0]= $randomString.rand(0, 9999).".jpg";
        $names[1]= $randomString.rand(0, 9999).".jpg";
        $names[2]= $randomString.rand(0, 9999).".jpg";
        $names[3]= $randomString.rand(0, 9999).".jpg";
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
    

    $check = getimagesize($_FILES["reg_certificate"]["tmp_name"]);
    if($check !== false) {
        $url_upload = $arr[0][0];
        echo $url_upload;


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
        var_dump($result_upload);
        $arr_upload = json_decode($result_upload,true);
        var_dump($arr_upload);

        $reg_certificate_id=$arr[0]['id'];

    } else {
        /*echo "File is not an image.";
        $uploadOk = 0;*/
        $reg_certificate_id="";
    }
}
?>

<form class="form-horizontal" method="post" action="neworganization.php" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<!-- <legend>CA Database</legend>
 --><h4><center> New Entry Organization</center></h4>

<!-- Select Basic -->
<div class="form-group">
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
    <input id="reg_certificate" name="reg_certificate" type="file">
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
    <input id="pan_card" name="pan_card" class="input-file" type="file">
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
<div class="form-group">
  <label class="col-md-4 control-label" for="typenumber">No of Partners: </label>
  <div class="col-md-4">                     
     <input type="number" name="no_of_partners" min="1" max="5" value="2" id="no_of_partners">
  </div>
</div>

<!-- <div class="form-group col-md-4 ">
  <label class="col-md-4 control-label"><b> <font size="4">Partner1</font></b></label>

</div> -->




<!-- Added Partner 1 -->
<label for="comment" style="margin-left: 334px;font-size: 17px;"> Partner 1: </label>





<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name: </label>  
  <div class="col-md-2 col-sm-2 col-2">
  <input id="partner_names[]" name="partner_names[]" type="text" placeholder="Enter Full Name" class="form-control input-md">
  </div>
  <div class="col-md-2 col-sm-2 col-2">
    <button id="singlebutton" name="singlebutton" class="btn btn-info ">New Entry</button>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="designation">Designation: </label>
  <div class="col-md-4">
    <select id="partner_designations[]" name="partner_designations[]" class="form-control">
      <option value="Managing Partner">Managing Partner</option>
      <option value="Manager">Manager</option>
      <option value="Other">Other</option>
    </select>
  </div>
  <div class="col-md-2">
     <input id="textinput" name="textinput" type="text" placeholder="Specify if Other" class="form-control input-md">
</div>

</div>


<!-- Buttons SAve and Cancel -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save_btn"></label>
  <div class="col-md-8">
    <button id="save_btn" name="save_btn" type="submit" class="btn btn-success" style="width: 10em;">Save</button><span><span></span></span>
    <button id="close_btn" name="close_btn" class="btn btn-warning" style="width: 10em;">Cancel</button>
  </div>
</div>
</fieldset>
</form>


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



