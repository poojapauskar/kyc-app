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
  <link rel="stylesheet" href="css/fileupload.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
  <!--  <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css"> -->
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
    /*border: 1px solid black;*/
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
</head>

<body style="background-color:#E8E8E8;overflow-x:hidden;">
<?php


/*echo $_POST['search'];*/
// if its cumin from edit org to search org then query based on edit org name

$text=$_GET['id'];

if($_GET["is_user"]==0){
  $is_user="0";
}else{
  $is_user="1";
}

$url_search = 'https://kyc-application.herokuapp.com/search/';
$options_search = array(
  'http' => array(
    'header'  => array(
                  'IS-USER: '.$is_user,
                  'PK: '.$text,
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

    <img style="margin-top:5%;margin-left:28px;width:50px;height:50px" src="images/green.png"></img><h5 style="margin-left:35%;margin-top:9%;"><?php echo $arr_search['response'][0]['organization_details']['name'] ?></h5>
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
      <div class="alert" style="margin-top:0%;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>

  <?php for($q=0;$q<count($arr_search['response'][0]['add_info']);$q++){
   echo "Status: ".$arr_search['response'][0]['add_info'][$q]['status'];
   echo "&nbsp;&nbsp;&nbsp;&nbsp;Date: ".$arr_search['response'][0]['add_info'][$q]['date'];
   echo "<br>";
  }?>

  </strong>
</div>
</div>
  

<div class="container">

<div class="mdl-grid" style="margin-left:80%;margin-top:19%">
  <div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--10-col-tablet mdl-shadow--2dp">
    <div class="mdl-card__title">
      <h1 class="mdl-card__title-text">Description and Status of Work</h1>
    </div>
    <div class="mdl-card__supporting-text">
      <?php for($q=0;$q<count($arr_search['response'][0]['add_info']);$q++){?>
   <strong>Type of work: </strong><?php echo $arr_search['response'][0]['add_info'][$q]['type_of_work'];echo "<br>";?>
   <strong>Status: </strong><?php echo $arr_search['response'][0]['add_info'][$q]['status'];echo "<br>";?>
   <strong>Date: </strong><?php echo $arr_search['response'][0]['add_info'][$q]['date'];echo "<br>";?>
   <strong>Comment: </strong><?php echo $arr_search['response'][0]['add_info'][$q]['comment'];echo "<br>";?>
   <br>
   <br>
 <?php }?>
    </div>
  </div>
</div> 

<?php if ($_GET['is_user']==0) { ?>
<form class="form-horizontal" method="post" action="edit.php?is_user=0" enctype="multipart/form-data" style="margin-top:-43%">

<fieldset>
 <input type="hidden" value="<?php echo $arr_search['response'][0]['organization_details']['pk'] ?>" name="org_id" id="org_id"></input>

<!-- Select Basic -->
<div class="form-group" style="margin-top:10%">
  <label class="col-md-4 control-label" for="type_of_org">Type of Organization:</label>
  <div class="col-md-4">
    <select id="type_of_org" name="type_of_org" class="form-control"  readonly>
      <option value="<?php echo $arr_search['response'][0]['organization_details']['type_of_org'];?>"><?php echo $arr_search['response'][0]['organization_details']['type_of_org'];?></option>
    </select>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textname">Name:</label>  
  <div class="col-md-4">
  <input value="<?php echo $arr_search['response'][0]['organization_details']['name'];?>" id="name" name="name" type="text" placeholder="Enter Name" class="form-control input-md" readonly>
    
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
      <input type="radio" name="registration" id="radios-0" value="1" class="mdl-radio__button" checked="<?php echo $checked1; ?>" readonly>
      Registered
    </label>
    <label class="mdl-radio mdl-js-radio" for="radios-1">
      <input type="radio" name="registration" id="radios-1" value="0" class="mdl-radio__button" checked="<?php echo $checked2; ?>" readonly>
      Un-Registered
    </label> 
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="reg_certificate">Registration Certificate:</label>

<div class="col-md-4">
<input id="uploadFile" class="form-control input-md" value="<?php echo $arr_search['response'][0]['reg_certificate_details'][0]['name']; ?>" readonly/>
  <div class="fileUpload btn btn-info" style="margin-left:105%;margin-top:-12%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="reg_certificate" name="reg_certificate" type="file" class="upload" disabled="true">
  
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

<button style="background-color:#176fac;margin-top:-25%;margin-left:129%;" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=reg_certificate_details&link=<?php echo $arr_img_download[0]['url']; ?>">VIEW</a>
</button>
</div>
</div>


<!-- Text input-->
<div class="form-group" style="margin-top:-3%">
  <label class="col-md-4 control-label" for="textinput" style="margin-left:-67%">PAN: </label>  
  <div class="col-md-4">
  <input id="pan" name="pan" style="margin-left:-108%" pattern="-?[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}?" value="<?php echo $arr_search['response'][0]['organization_details']['pan'] ?>" type="text" placeholder="PAN Card Number" class="form-control input-md" readonly/>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN Card:</label>
  <div class="col-md-4">
  <input id="pan_upload" class="form-control input-md" value="<?php echo $arr_search['response'][0]['pan_card_details'][0]['name']; ?>" readonly/>
  <div class="fileUpload btn btn-info" style="margin-left:105%;margin-top:-12%;">
  <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
  <input id="pan_card" name="pan_card" type="file" class="upload" disabled="true">

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

<button style="background-color:#176fac;margin-top:-26%;margin-left:129%;" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=pan_card_details&link=<?php echo $arr_img_download_2[0]['url']; ?>">VIEW</a>
</button>
</div>
</div>

<!-- Textarea -->

<div class="form-group" style="margin-top:-3%">
  <label class="col-md-4 control-label" for="textarea" style="margin-left:-67%">Address:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address" style="margin-left:-107%" readonly><?php echo $arr_search['response'][0]['organization_details']['address'] ?></textarea>
  </div>
</div>

<!-- Multiple Checkboxes  and File upload Button -->   

<div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes">address Proof:</label>
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
<div class="fileUpload btn btn-info" style="margin-left:312%;margin-top:-21%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
<input id="telephone_bill" value="<?php echo $arr_search['response'][0]['organization_details']['telephone'] ?>" style="margin-top: -20px;margin-left: 129px;" name="telephone_bill" class="upload" type="file"  disabled="true">  
</div> 

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

<button style="background-color:#176fac;margin-top:-147%;margin-left:473%;" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=telephone_bill_details&link=<?php echo $arr_img_download_3[0]['url']; ?>">VIEW</a>
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
<div class="fileUpload btn btn-info" style="margin-left:312%;margin-top:-21%;">
    <label style="font-weight:500;margin-bottom: 2px;">ATTACH</label>
    <input id="bank_pass_book" style="margin-top: -22px;margin-left: 129px;" name="bank_pass_book" class="upload" type="file"  disabled="true"> 
</div>

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

<button style="background-color:#176fac;margin-top:-144%;margin-left:476%;" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=pass_book_details&link=<?php echo $arr_img_download_4[0]['url']; ?>">VIEW</a>
</button>
</div>

 </div>
</div>
<!-- Added Partner 1 -->
<label for="comment" style="margin-left: 279px;margin-top:-27%;font-size: 17px;"> Partner 1: </label>
<?php for($x=0;$x < count($arr_search['response'][0]['partner_details']); $x++){?>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name:</label>  
  <div class="col-md-4 col-sm-2 col-2">
  <input id="partner_names[]" value="<?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['name'] ?>" name="partner_names[]" type="text" placeholder="Enter Full Name" class="form-control input-md"  readonly>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="designation">Designation: </label>
  <div class="col-md-4">
    <select id="partner_designations[]" name="partner_designations[]" class="form-control"  readonly>
 <option value="<?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['designation'] ?>"><?php echo $arr_search['response'][0]['partner_details'][$x]['detail'][0]['designation'] ?></option>
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
    <button id="save_btn" name="save_btn" type="submit" class="btn btn-success" style="width: 10em;margin-left:2%;">Edit</button><span><span></span></span>
    <button onclick="ClickEvent()" style="width: 10em;margin-left:2%;" class="btn btn-warning"><a style="color:white" href="search.php">Cancel</a></button>
  
  </div>
</div>
</fieldset>
</form>

<?php } else { ?>

<form style="margin-top:-30%" onsubmit="return proceed();" name="Form" id="Form" class="form-horizontal" method="post" action="edit.php?is_user=1" enctype="multipart/form-data">
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
 <input type="hidden" value="<?php echo $arr_search['response'][0]['user_details']['pk'] ?>" name="user_id" id="user_id"></input>

<?php if($url=="" || (strpos($url, 'https://kyc-app-bucket.s3.amazonaws.com/?Signature') !== false)){
  $img_lnk="images/no_image.jpg";
}else{
    $img_lnk=$arr_img[0]['url'];
}?>

<img class="profile-pic" style="margin-left:77%;margin-top:25%;position:absolute;z-index:2;" src="<?php echo $img_lnk; ?>" />
<div class="upload-button" style="position:absolute;z-index:2;margin-left:79%;cursor:pointer;margin-top:40%;"><button disabled>Upload Image</button></div>


<input name="image" id="image" class="file-upload1" style="position:absolute;z-index:-2;margin-left:44%;margin-top:16%;" type="file">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">UID:</label>  
  <div class="col-md-4">
  <input id="uid" name="uid" type="text" value="<?php echo $arr_search['response'][0]['user_details']['uid'] ?>" placeholder="" class="form-control input-md" readonly>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name:</label>  
  <div class="col-md-4">
  <input id="name" name="name" value="<?php echo $arr_search['response'][0]['user_details']['name'] ?>" type="text" placeholder="" class="form-control input-md" readonly>
    
  </div>
</div>
<!--date-->
<div class="form-group">
  <label for="textinput" class="col-md-4 control-label">Dob:</label>
  <div class="col-md-4">
    <input style="wisth:100% !important" class="form-control input-md" id="date" name="date" value="<?php echo $arr_search['response'][0]['user_details']['dob'] ?>" style="width:31%;margin-left:34.6%;margin-top:-2%;" type="text" readonly>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Profession:</label>
  <div class="col-md-4">
    <select id="profession" name="profession" class="form-control" readonly>
      <option value="<?php echo $arr_search['response'][0]['user_details']['proffesion'] ?>"><?php echo $arr_search['response'][0]['user_details']['proffesion'] ?></option>
      <!-- <option value="Option one">Option one</option>
      <option value="Option two">Option two</option>
      <option value="Option three">Option three</option>
      <option value="Option four">Option four</option> -->
    </select>
  </div>
</div>

<!-- Text input-->
<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="specify " class="form-control input-md" readonly>
    
  </div>
</div> -->

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="address" name="address" value="<?php echo $arr_search['response'][0]['user_details']['address'] ?>" readonly><?php echo $arr_search['response'][0]['user_details']['address'] ?></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">PAN:</label>  
  <div class="col-md-4">
  <input id="pan" name="pan" value="<?php echo $arr_search['response'][0]['user_details']['pan'] ?>" type="text" placeholder="" class="form-control input-md" readonly>
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton" >PAN card:</label>

<div class="col-md-4">
<?php echo $arr_search['response'][0]['pan_card_details'][0]['name']; ?>
</div>


<div class="col-md-4">
<input id="pan_card" name="pan_card" style="margin-left:-47%" value="<?php echo $_POST['pan_card'] ?>" class="input-file" type="file" disabled>
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

<button style="margin-left:114%;margin-top:-13%" class="btn btn-success">

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
</div>


<div class="col-md-4">

<input id="telephone_bill"  value="<?php echo $_POST['telephone_bill'] ?>" style="margin-top: 5px;margin-left: 126px;" name="telephone_bill" class="input-file" type="file" disabled>     
 </div>


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


<button style="margin-left:70%;margin-top:-6%" class="btn btn-success">
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
<input id="bank_pass_book"  value="<?php echo $_POST['bank_pass_book'] ?>" style="margin-top: 6px;margin-left: 129px;position:absolute;" name="bank_pass_book" class="input-file" type="file" disabled>     
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
    </div>

  <div class="col-sm-4">
  <input id="voter_id" value="<?php echo $_POST['voter_id'] ?>" style="margin-top: 6px;margin-left: 129px;position:absolute;" name="voter_id" class="input-file" type="file" disabled>     
   </div>

   <div class="col-md-4">
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
  <input id="passport" value="<?php echo $_POST['passport'] ?>" style="margin-top: 6px;margin-left: 129px;position:absolute;" name="passport" class="input-file" type="file" disabled>     
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


<button style="margin-left:88%" class="btn btn-success">
<a target="_blank" style="color:white" href="view_image.php?name=passport_details&link=<?php echo $arr_img_download_5[0]['url']; ?>">View</a>
</button>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Adhar card No.</label>  
  <div class="col-md-4">
  <input id="aadhar_no" name="aadhar_no" value="<?php echo $arr_search['response'][0]['user_details']['aadhar_no'] ?>" type="text" placeholder="" class="form-control input-md" readonly>
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Adhar card:</label>

  <div class="col-md-4">
  <?php echo $arr_search['response'][0]['aadhar_card_details'][0]['name']; ?>
  </div>

  <div class="col-md-4">
    <input id="aadhar_card" style="margin-left:-47%" name="aadhar_card" value="<?php echo $_POST['aadhar_card'] ?>" class="input-file" type="file" disabled>
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

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-success" style="width: 10em;">Edit</button><span><span></span></span>
    <button onclick="ClickEvent()" class="btn btn-warning"><a style="color:white" href="search.php">Cancel</a></button>
  </div>
</div>

</fieldset>
</form>

<?php } ?>

</main>
</body>
</html>



