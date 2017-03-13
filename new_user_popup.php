<html>
  <head>
    <!---bootstrap-->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/material.indigo-pink.min.css">

<link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="css/material.css">


 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
    max-width: 130px;
    max-height: 130px;
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

pan_card_1_user = document.getElementById('pan_card_1');
    if(pan_card_1_user.files.length != 0){
        var isValid = /\.(jpg|jpeg|png|gif|pdf)$/.test(pan_card_1_user.value);
        if (!isValid) {
          alert('Pan Card: Only image or pdf files allowed!');
          return false;
        }
    }

    telephone_bill_1_user = document.getElementById('telephone_bill_1');
    if(telephone_bill_1_user.files.length != 0){
        var isValid = /\.(jpg|jpeg|png|gif|pdf)$/.test(telephone_bill_1_user.value);
        if (!isValid) {
          alert('Telephone Bill: Only image and pdf files allowed!');
          return false;
        }
    }

    bank_pass_book_1_user = document.getElementById('bank_pass_book_1');
    if(bank_pass_book_1_user.files.length != 0){
        var isValid = /\.(jpg|jpeg|png|gif|pdf)$/.test(bank_pass_book_1_user.value);
        if (!isValid) {
          alert('Bank Pass Book: Only image and pdf files allowed!');
          return false;
        }
    }

    voter_id_1_user = document.getElementById('voter_id_1');
    if(voter_id_1_user.files.length != 0){
        var isValid = /\.(jpg|jpeg|png|gif|pdf)$/.test(voter_id_1_user.value);
        if (!isValid) {
          alert('Voter Id: Only image and pdf files allowed!');
          return false;
        }
    }

    passport_1_user = document.getElementById('passport_1');
    if(passport_1_user.files.length != 0){
        var isValid = /\.(jpg|jpeg|png|gif|pdf)$/.test(passport_1_user.value);
        if (!isValid) {
          alert('Passport: Only image and pdf files allowed!');
          return false;
        }
    }

    aadhar_card_1_user = document.getElementById('aadhar_card_1');
    if(aadhar_card_1_user.files.length != 0){
        var isValid = /\.(jpg|jpeg|png|gif|pdf)$/.test(aadhar_card_1_user.value);
        if (!isValid) {
          alert('Aadhar Card: Only image and pdf files allowed!');
          return false;
        }
    }

    image_user = document.getElementById('image');
    if(image_user.files.length != 0){
        var isValid = /\.(jpg|jpeg|png|gif|pdf)$/.test(image_user.value);
        if (!isValid) {
          alert('Profile Pic: Only image and pdf files allowed!');
          return false;
        }
    }

var a=document.forms["Form_popup"]["uid"].value;
if(a==null || a==''){
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( var i=0; i < 7; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));


        

        var mystring= (document.getElementById('name1').value).substring(0, 3);
        var uid_gen=mystring+text;
        document.getElementById('uid').value = uid_gen;
        document.getElementById('uid_in_popup').value = uid_gen;

        /*alert("UID generated: "+uid_gen);*/
        var yourUl = document.getElementById("popup1");
        yourUl.style.display = yourUl.style.display === 'none' ? '' : 'none';
        return false;
}else{   


        document.getElementById('uid_in_popup').value = document.getElementById('uid').value;

        /*alert("UID generated: "+uid_gen);*/
        var yourUl = document.getElementById("popup1");
        yourUl.style.display = yourUl.style.display === 'none' ? '' : 'none';
        return false;
}
}
</script>


<!-- Datepicker -->
<link rel="stylesheet" type="text/css" href="css/jquery.datepick.css"> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() {
 $( ".datepicker_popup" ).datepick({dateFormat: 'dd/mm/yyyy'});
});
</script>

</head>
<body style="background-color:#E8E8E8;">

<script type="text/javascript">
  function submit_form(){
    // new entry added should be displayed as partners name in organization page

        for(var p=0; p<10; p++){
            if(document.getElementsByClassName('partner_names')[p]){
                        if(document.getElementsByClassName('partner_names')[p].value==""){
                           document.getElementsByClassName('partner_names')[p].value=document.getElementById('name1').value;
                           break;
                        }
             /*alert(p);
             alert(document.getElementsByClassName('partner_names')[p].value);
             if(document.getElementsByClassName('partner_names')[p].value == ""){
                alert("Null Value");
             }else{
                alert("Not Null Value");
             }*/
            
            }
        }
    $('#Form_popup').submit();
  }
</script>

<script type="text/javascript">
    function make_uid_null(){
    
    $('#uid').val("");
    document.getElementById("popup1").style.display='none';
    /*alert("helo");*/
  }
</script>

<!-- <p>Click on the "x" symbol to close the alert message.</p> -->
<div class="alert" id="popup1" class="popup1" style="display:none;text-align:center;position:absolute;
    width:100%;
    top: 60%;z-index:2">
 <!--  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> -->
 <!--  <form method="post" action="new_user.php">  -->
  <label>UID Generated</label><br>
  <input type="text" id="uid_in_popup" name="uid_in_popup" style="text-align:center;background-color:transparent;color:black;border:none"></input><br><br>
  <button style="margin-left:1%" id="done" class="btn btn-success" name="done" onclick="submit_form()">Done</button>
  <button onclick="make_uid_null()" id="cancel1" class="btn btn-warning" name="cancel1">Cancel</button>
  <!-- </form> -->
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $names=array();
        $names[0]= "pan_card_1".rand(0, 9999).".jpg";
        $names[1]= "voter_id_1".rand(0, 9999).".jpg";
        $names[2]= "pass_book".rand(0, 9999).".jpg";
        $names[3]= "telephone_bill_1".rand(0, 9999).".jpg";
        $names[4]= "aadhar_card_1".rand(0, 9999).".jpg";
        $names[5]= "passport_1".rand(0, 9999).".jpg";
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
    

    $check = getimagesize($_FILES["pan_card_1"]["tmp_name"]);
    if($check !== false) {
        $url_upload = $arr[0][0];
        /*echo $url_upload;*/


        $filename = $_FILES["pan_card_1"]["tmp_name"];
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

        $pan_card_1_id=$arr[0]['id'];

    } else {
        $pan_card_1_id="";
    }


    $check_voter_id_1 = getimagesize($_FILES["voter_id_1"]["tmp_name"]);
    if($check_voter_id_1 !== false) {
        $url_upload_voter_id_1 = $arr[1][1];
        /*echo $url_upload;*/


        $filename_voter_id_1 = $_FILES["voter_id_1"]["tmp_name"];
        $file_voter_id_1 = fopen($filename_voter_id_1, "rb");
        $data_voter_id_1 = fread($file_voter_id_1, filesize($filename_voter_id_1));

        /*echo $data;*/

        $options_upload_voter_id_1 = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_voter_id_1,
          ),
        );
        $context_upload_voter_id_1  = stream_context_create($options_upload_voter_id_1);
        $result_upload_voter_id_1 = file_get_contents($url_upload_voter_id_1, false, $context_upload_voter_id_1);
        /*var_dump($result_upload_voter_id_1);*/
        $arr_upload_voter_id_1 = json_decode($result_upload_voter_id_1,true);
        /*var_dump($arr_upload_voter_id_1);*/

        $voter_card_id=$arr[1]['id'];

    } else {
        $voter_card_id="";
    }

    $check_pass_book = getimagesize($_FILES["bank_pass_book_1"]["tmp_name"]);
    if($check_pass_book !== false) {
        $url_upload_pass_book = $arr[2][2];
        /*echo $url_upload;*/


        $filename_pass_book = $_FILES["bank_pass_book_1"]["tmp_name"];
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

    $check_telephone_bill_1 = getimagesize($_FILES["telephone_bill_1"]["tmp_name"]);
    if($check_telephone_bill_1 !== false) {
        $url_upload_telephone_bill_1 = $arr[3][3];
        /*echo $url_upload;*/


        $filename_telephone_bill_1 = $_FILES["telephone_bill_1"]["tmp_name"];
        $file_telephone_bill_1 = fopen($filename_telephone_bill_1, "rb");
        $data_telephone_bill_1 = fread($file_telephone_bill_1, filesize($filename_telephone_bill_1));

        /*echo $data;*/

        $options_upload_telephone_bill_1 = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_telephone_bill_1,
          ),
        );
        $context_upload_telephone_bill_1  = stream_context_create($options_upload_telephone_bill_1);
        $result_upload_telephone_bill_1 = file_get_contents($url_upload_telephone_bill_1, false, $context_upload_telephone_bill_1);
        /*var_dump($result_upload_telephone_bill_1);*/
        $arr_upload_telephone_bill_1 = json_decode($result_upload_telephone_bill_1,true);
        /*var_dump($arr_upload_telephone_bill_1);*/

        $telephone_bill_1_id=$arr[3]['id'];

    } else {
        $telephone_bill_1_id="";
    }

    $check_aadhar_card_1 = getimagesize($_FILES["aadhar_card_1"]["tmp_name"]);
    if($check_aadhar_card_1 !== false) {
        $url_upload_aadhar_card_1 = $arr[4][4];
        /*echo $url_upload;*/


        $filename_aadhar_card_1 = $_FILES["aadhar_card_1"]["tmp_name"];
        $file_aadhar_card_1 = fopen($filename_aadhar_card_1, "rb");
        $data_aadhar_card_1 = fread($file_aadhar_card_1, filesize($filename_aadhar_card_1));

        /*echo $data;*/

        $options_upload_aadhar_card_1 = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_aadhar_card_1,
          ),
        );
        $context_upload_aadhar_card_1  = stream_context_create($options_upload_aadhar_card_1);
        $result_upload_aadhar_card_1 = file_get_contents($url_upload_aadhar_card_1, false, $context_upload_aadhar_card_1);
        /*var_dump($result_upload_aadhar_card_1);*/
        $arr_upload_aadhar_card_1 = json_decode($result_upload_aadhar_card_1,true);
        /*var_dump($arr_upload_aadhar_card_1);*/

        $aadhar_card_1_id=$arr[4]['id'];

    } else {
        $aadhar_card_1_id="";
    }

    $check_passport_1 = getimagesize($_FILES["passport_1"]["tmp_name"]);
    if($check_passport_1 !== false) {
        $url_upload_passport_1 = $arr[5][5];
        /*echo $url_upload;*/


        $filename_passport_1 = $_FILES["passport_1"]["tmp_name"];
        $file_passport_1 = fopen($filename_passport_1, "rb");
        $data_passport_1 = fread($file_passport_1, filesize($filename_passport_1));

        /*echo $data;*/

        $options_upload_passport_1 = array(
          'http' => array(
            'header'  => "Content-type: \r\n",
            'method'  => 'PUT',
            'content' => $data_passport_1,
          ),
        );
        $context_upload_passport_1  = stream_context_create($options_upload_passport_1);
        $result_upload_passport_1 = file_get_contents($url_upload_passport_1, false, $context_upload_passport_1);
        /*var_dump($result_upload_passport_1);*/
        $arr_upload_passport_1 = json_decode($result_upload_passport_1,true);
        /*var_dump($arr_upload_passport_1);*/

        $passport_1_id=$arr[5]['id'];

    } else {
        $passport_1_id="";
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
                          'NAME: '.$_POST['name1'],
                          'DOB: '.$_POST['date1'],
                          'PROFFESION: '.$_POST['profession'],
                          'PAN: '.$_POST['pan'],
                          'PAN-CARD: '.$pan_card_1_id,
                          'ADDRESS: '.$_POST['address'],
                          'TELEPHONE-BILL: '.$telephone_bill_1_id,
                          'BANK-PASS-BOOK: '.$pass_book_id,
                          'VOTER-ID: '.$voter_card_id,
                          'PASSPORT: '.$passport_1_id,
                          'AADHAR-NO: '.$aadhar_no,
                          'AADHAR-CARD: '.$aadhar_card_1_id,
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


/*update list */
 /*$db = pg_connect("host=ec2-107-20-191-76.compute-1.amazonaws.com port=5432 dbname=deu9vahl80fvjn user=vdvqpruzihrics password=17b3e7a56da97ca021e3da54bb1694bb799849a2b5911014ed6caa05e1e4e02d");
 pg_select($db, 'post_log', $_POST);
 

 $query=pg_query("SELECT id,name FROM users_users");

 $json=array();

while ($student = pg_fetch_array($query)) {
    $json[$student["id"]] = $student["name"];
}

$textval = json_encode($json);
$foo = "var partnames=" . $textval;
file_put_contents('autocomplete-Files/NewEntryValues.js', $foo);
file_put_contents('autocomplete-Files/EditEntryValues.js', $foo);


echo '  <script type="text/javascript" src="autocomplete-Files/jquery.mockjax.js"></script>
        <script type="text/javascript" src="autocomplete-Files/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="autocomplete-Files/NewEntryValues.js"></script>
        <script type="text/javascript" src="autocomplete-Files/Logic_NewEntry.js"></script>
        <script type="text/javascript" src="autocomplete-Files/EditEntryValues.js"></script>
        <script type="text/javascript" src="autocomplete-Files/Logic_EditEntry.js"></script>';

*/


  /*return false;*/
  echo "<script>
             window.history.go(-1);
     </script>";
}
?>


<div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#08426a;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" >

        <a href="search.php"><img style="margin-top:5%;margin-left:28px;width:50px;height:50px" src="images/green.png"></img></a>
<h5 style="margin-left:35%;margin-top:9%;">New Entry Individual</h5>
         <span class="mdl-layout-title" style="margin-left:26%;margin-top:7%;">KYCApp</span>
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

<form name="Form_popup" id="Form_popup" class="form-horizontal" method="post" action="new_user_popup.php" enctype="multipart/form-data">
<fieldset>

<!-- Form_popup Name -->
<!-- <legend><center>New Individual Entry</center></legend> -->
<!--avatar upload-->

<div style="margin-top:7%">
<img class="profile-pic" style="margin-left:77%;position:absolute;z-index:2;" src="images/boy-512.png" />
<div class="upload-button" style="position:absolute;z-index:2;margin-left:79%;margin-top:23%;">Upload Image</div>
<input name="image" id="image" class="file-upload1" style="position:absolute;z-index:-2;margin-left:46%;margin-top:16%;" type="file">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">UID:</label>  
  <div class="col-md-4">
  <input id="uid" name="uid" type="text" value="<?php echo $_POST['uid'] ?>" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name:</label>  
  <div class="col-md-4">
  <input id="name1" name="name1" value="<?php echo $_POST['name'] ?>" type="text" placeholder="" class="form-control input-md" required>
    
  </div>
</div>
<!--date-->
<div class="form-group row">

  <label for="example-date-input" class="col-2 col-form-label" style="margin-left:24.5%;">DOB:</label>
  <div class="col-4">
    <input class="form-control datepicker_popup" id="date1" name="date1" value="<?php echo $_POST['date1'] ?>" style="width:28.9%;margin-left:35.6%;margin-top:-4%;" type="text">

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
  <input id="pan" name="pan" value="<?php echo $_POST['pan'] ?>" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN card:</label>
  <div class="col-md-4">
    <input id="pan_card_1" name="pan_card_1" value="<?php echo $_POST['pan_card_1'] ?>" class="input-file" type="file">
  </div>
</div>

<!--address proof-->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">Address Proof:</label>
  <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Telephone</label>
<input id="telephone_bill_1"  value="<?php echo $_POST['telephone_bill_1'] ?>" style="margin-top: -20px;margin-left: 129px;" name="telephone_bill_1" class="input-file" type="file">     
 </div>
</div>


    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Bank Passbook</label>
<input id="bank_pass_book_1"  value="<?php echo $_POST['bank_pass_book_1'] ?>" style="margin-top: -22px;margin-left: 129px;" name="bank_pass_book_1" class="input-file" type="file">     
 </div>
</div>

<!--ID pROOF-->

<!--address proof-->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes">ID Proof:</label>
  <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">voter ID</label>
<input id="voter_id_1" value="<?php echo $_POST['voter_id_1'] ?>" style="margin-top: -20px;margin-left: 129px;" name="voter_id_1" class="input-file" type="file">     
 </div>
</div>


    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Passport:</label>
<input id="passport_1" value="<?php echo $_POST['passport_1'] ?>" style="margin-top: -22px;margin-left: 129px;" name="passport_1" class="input-file" type="file">     
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
    <input id="aadhar_card_1" name="aadhar_card_1" value="<?php echo $_POST['aadhar_card_1'] ?>" class="input-file" type="file">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Type of work:</label>
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
  <label class="col-md-4 control-label" for="selectbasic">Status:</label>
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
  <label for="example-date-input" class="col-2 col-form-label" style="margin-left:24.5%;">DATE:</label>
  <div class="col-4">
    <input class="form-control datepicker_popup" id="date[]" name="date[]" value="<?php echo $_POST['date'] ?>" style="width:28.9%;margin-left:35.6%;margin-top:-4%;" type="text">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Comment:</label>  
  <div class="col-md-4">
  <input id="comment[]" name="comment[]" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

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

  <div class="col-md-4" style="text-align:center">
    <button onclick="return proceed()" id="generate_btn" name="generate_btn">Generate</button>
    <!-- <button id="singlebutton" style="margin-left:13%;" name="singlebutton" class="btn btn-primary"><a style="color:white" onclick="goBack()">Discard</a></button> -->

  </div>
</div>

</fieldset>
</form>


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
              $(wrapper).prepend('<br><div style="margin-left:50%;"><div class="form-group"><label class="control-label" for="selectbasic" style="margin-left:-220px;">Type of work</label><div class="col-md-6"><select id="selectbasic" name="selectbasic" class="form-control" style="margin-left:17%;width:222%"><option value="1">Option one</option><option value="2">Option two</option><option value="3">Option three</option></select></div></div><div class="form-group"> <label class="col-md-4 control-label" for="selectbasic" style="margin-left:-29%">Status</label><div class="col-md-6"><select id="selectbasic" name="selectbasic" style="width:210%;margin-left:-1%;" class="form-control"><option value="PR">Pending Request</option><option value="WP">Work in Process</option><option value="CR">Completed Request</option></select></div></div><div class="form-group row"><label for="example-date-input" class="col-2 col-form-label" style="margin-left:-15.5%;";">DATE</label><div class="col-8"><input class="form-control datepicker_popup" id="date" name="date" value="<?php echo $_POST['date'] ?>" style="width:86%;margin-left:10.6%;margin-top:-10%;" type="text"></div></div><div class="form-group"><label class="col-md-4 control-label" for="textinput" style="margin-left:-36%">Comment</label><div class="col-md-4"><input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" style="width:342%;margin-left:20%"></div></div></center><a href="#" class="remove_field"><img src="images/del24.png" style="margin-left: 443px; margin-top: -81px;"></a></a></div>'); //add input box\

        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

    </script>

</body>
</html>
