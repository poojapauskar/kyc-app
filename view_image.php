<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php 

$url= $_SERVER['REQUEST_URI'];

$url = explode('link=', $url);
$url = $url[1];

/*echo $important;*/
/*echo $_GET['name'];*/

if($_GET['name'] == 'pan_card_details'){
	$certificate_name= "Pan Card";
}elseif($_GET['name'] == 'telephone_bill_details'){
	$certificate_name= "Telephon Bill";
}elseif($_GET['name'] == 'bank_pass_book_details'){
	$certificate_name= "Pass Book";
}elseif($_GET['name'] == 'pass_book_details'){
	$certificate_name= "Pass Book";
}elseif($_GET['name'] == 'voter_id_details'){
	$certificate_name= "Voter Id";
}elseif($_GET['name'] == 'passport_details'){
	$certificate_name= "Passport";
}elseif($_GET['name'] == 'aadhar_card_details'){
	$certificate_name= "Aadhar Card";
}elseif($_GET['name'] == 'reg_certificate_details'){
	$certificate_name= "Registration Certificate";
}

?>

<div style="text-align:center;margin-top:12%">
<h3><?php echo $certificate_name; ?></h3>


<!-- if url has https://kyc-app-bucket.s3.amazonaws.com/?Signature then it has no-image -->
<?php if($url=="" || (strpos($url, 'https://kyc-app-bucket.s3.amazonaws.com/?Signature') !== false)){
	$img_lnk="images/no_image.jpg";
}else{
    $img_lnk=$url;
}?>

<img src="<?php echo $img_lnk; ?>"></img>

<div style="margin-top:5%;" class="row">
 <div class="col-sm-3">
 </div>
 <div class="col-sm-2">
  <button>Print</button>
 </div>
 <div class="col-sm-2">
  <button>Email</button>
 </div>
 <div class="col-sm-2">
  <button>
	  <a download="<?php echo $certificate_name."jpg"; ?>" href="<?php echo $url; ?>" title="Save">Save
	  </a>
  </button>
 </div>
 <div class="col-sm-3">
 </div>
</div>

</div>

</body>
</html>
