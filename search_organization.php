<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/material.indigo-pink.min.css">

<link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="css/material.css">


 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <style type="text/css">
    span:before{
    content:" "; 
    display:inline-block; 
    width:32px;
}
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
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
</head>
<body  style="overflow-y: scroll;background-color:#E8E8E8" >

<?php


/*echo $_POST['search'];*/
// if its cumin from edit org to search org then query based on edit org name

$text=$_GET['text'];

$url_search = 'https://kyc-application.herokuapp.com/search/';
$options_search = array(
  'http' => array(
    'header'  => array(
                  'TEXT: '.$text,
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

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#08426a;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" >

        <img style="margin-top:5%;margin-left:28px;width:50px;height:50px" src="images/green.png"></img>
<h5 style="margin-left:35%;margin-top:9%;"><?php echo $arr_search['response'][0]['organization_details']['name'] ?></h5>
         <span class="mdl-layout-title" style="margin-left:26%;margin-top:7%;">KYChome</span>
          <!-- Add spacer, to align navigation to the right -->
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="search.php">Home</a>
          <a class="mdl-navigation__link" href="new_organization.php">New Entry Organization</a>
          <a class="mdl-navigation__link" href="new_user.php">New Entry Individual</a>
          <a class="mdl-navigation__link" href="missing_reports.php">Missing Reports</a>
          <a class="mdl-navigation__link" href="search.php">Admin</a>
          <a class="mdl-navigation__link" href="">Help</a>
          <a class="mdl-navigation__link" href="">About Us</a>
          <a class="mdl-navigation__link" href="">Contact</a>
        </nav>
      </div>
        </div>
      </header>

      <h2>Alert Messages</h2>

<p>Click on the "x" symbol to close the alert message.</p>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div>

<form class="form-horizontal" method="post" action="edit_organization.php" enctype="multipart/form-data">

<fieldset>

<!-- Form Name -->
<!-- <legend>CA Database</legend>
 --><!-- <h4><center><?php echo $arr_search['response'][0]['organization_details']['name'] ?></center></h4> -->

 <input type="hidden" value="<?php echo $arr_search['response'][0]['organization_details']['pk'] ?>" name="org_id" id="org_id"></input>

<!-- Select Basic -->
<div class="form-group" style="margin-top:10%">
  <label class="col-md-4 control-label" for="type_of_org">Type of Organization</label>
  <div class="col-md-4">
    <select id="type_of_org" name="type_of_org" class="form-control"  readonly>
      <option value="<?php echo $arr_search['response'][0]['organization_details']['type_of_org'];?>"><?php echo $arr_search['response'][0]['organization_details']['type_of_org'];?></option>
      <!-- <option value="Partnership">Partnership</option>
      <option value="Individual">Individual</option> -->
    </select>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textname">Name</label>  
  <div class="col-md-4">
  <input value="<?php echo $arr_search['response'][0]['organization_details']['name'];?>" id="name" name="name" type="text" placeholder="Enter Name" class="form-control input-md" readonly>
    
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
      <input type="radio" name="registration" id="radios-0" value="1" checked="<?php echo $checked1; ?>"  readonly>
      Registered
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="registration" id="radios-1" value="0" checked="<?php echo $checked2; ?>"  readonly>
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
    <input id="reg_certificate" name="reg_certificate" type="file"  disabled="true">
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
<button style="background-color:#65AC4C" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=reg_certificate_details&link=<?php echo $arr_img_download[0]['url']; ?>">View</a>
</button>

</div>

</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">PAN </label>  
  <div class="col-md-4">
  <input id="pan" name="pan" value="<?php echo $arr_search['response'][0]['organization_details']['pan'] ?>" type="text" placeholder="PAN Card Number" class="form-control input-md"  readonly>
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN Card</label>
<div class="col-md-4">
 <?php echo $arr_search['response'][0]['pan_card_details'][0]['name']; ?>
</div>
  <div class="col-md-4">
    <input id="pan_card" name="pan_card" type="file"  disabled="true">
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
<button style="background-color:#65AC4C" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=pan_card_details&link=<?php echo $arr_img_download_2[0]['url']; ?>">View</a>
</button>
</div>

</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address"  readonly><?php echo $arr_search['response'][0]['organization_details']['address'] ?></textarea>
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
     <input <?php echo $check_box_select1;?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1"  readonly>Telephone</label>
    
  </div>
<div class="col-md-3">
     <?php echo $arr_search['response'][0]['telephone_bill_details'][0]['name']; ?>
</div>



<div class="col-md-3">
<input id="telephone_bill" value="<?php echo $arr_search['response'][0]['organization_details']['telephone'] ?>" style="margin-top: -20px;margin-left: 129px;" name="telephone_bill" class="input-file" type="file"  disabled="true">  
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

<br>
<button style="background-color:#65AC4C;margin-left:-97%" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=telephone_bill_details&link=<?php echo $arr_img_download_3[0]['url']; ?>">View</a>
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
     <input <?php echo $check_box_select2;?> type="checkbox" name="checkboxes" id="checkboxes-0" value="1"  readonly>Bank Passbook</label>
</div>
<div class="col-md-3"> 
     <?php echo $arr_search['response'][0]['pass_book_details'][0]['name']; ?>
</div>
<div class="col-md-3">
    <input id="bank_pass_book" style="margin-top: -22px;margin-left: 129px;" name="bank_pass_book" class="input-file" type="file"  disabled="true"> 
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
<br>
<button style="background-color:#65AC4C;margin-left:-97%" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=pass_book_details&link=<?php echo $arr_img_download_4[0]['url']; ?>">View</a>
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
  <input id="partner_names[]" value="<?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['name'] ?>" name="partner_names[]" type="text" placeholder="Enter Full Name" class="form-control input-md"  readonly>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="designation">Designation: </label>
  <div class="col-md-4">
    <select id="partner_designations[]" name="partner_designations[]" class="form-control"  readonly>
 <option value="<?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['designation'] ?>"><?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['designation'] ?></option>
      <!-- <option value="Managing Partner">Managing Partner</option>
      <option value="Manager">Manager</option>
      <option value="Other">Other</option> -->
    </select>
  </div>
  <div class="col-md-2">
     <input id="textinput" name="textinput" type="text" placeholder="Specify if Other" class="form-control input-md" readonly>
  </div>

</div>

<?php }?>




<!-- Buttons SAve and Cancel -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save_btn"></label>
  <div class="col-md-8">
    <button id="save_btn" name="save_btn" type="submit" class="btn btn-success" style="width: 10em;">Edit</button><span><span></span></span>
    <button onclick="ClickEvent()" class="btn btn-warning"><a style="color:white" href="search.php">Cancel</a></button>
  
  </div>
</div>
</fieldset>
</form>


</body>
</html>



