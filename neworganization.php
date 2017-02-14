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
<body  style="overflow-x: hidden; overflow-y: scroll;" >


<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<!-- <legend>CA Database</legend>
 --><h4><center> New Entry Organization</center></h4>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Type of Organization</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">Partnership</option>
      <option value="2">Individual</option>
    </select>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textname">Name</label>  
  <div class="col-md-4">
  <input id="textname" name="textname" type="text" placeholder="Enter Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Registration</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
      Registered
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="radios" id="radios-1" value="2">
      Un-Registered
    </label>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">Registration Certificate</label>
  <div class="col-md-4">
    <input id="filebutton" name="filebutton" class="input-file" type="file">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">PAN </label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="PAN Card Number" class="form-control input-md" required="">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">PAN Card</label>
  <div class="col-md-4">
    <input id="filebutton" name="filebutton" class="input-file" type="file">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Address</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="textarea">Enter Address</textarea>
  </div>
</div>

<!-- Multiple Checkboxes  and File upload Button -->   

    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Telephone</label>
<input id="filebutton" style="margin-top: -20px;margin-left: 129px;" name="filebutton" class="input-file" type="file">     
 </div>
</div>



    <div class="form-group">
 <label class="col-md-4 control-label" for="checkboxes"></label>
 <div class="col-md-4">
   <label class="checkbox-inline" for="checkboxes-0">
     <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">Bank Passbook</label>
<input id="filebutton" style="margin-top: -22px;margin-left: 129px;" name="filebutton" class="input-file" type="file">     
 </div>
</div>

<!-- Input Type : Number -->
<div class="form-group">
  <label class="col-md-4 control-label" for="typenumber">No of Partners: </label>
  <div class="col-md-4">                     
     <input type="number" name="quantity[]" min="1" max="5" value="2" id="add_new_partner">
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
  <input id="textinput" name="textinput" type="text" placeholder="Enter Full Name" class="form-control input-md">
  </div>
  <div class="col-md-2 col-sm-2 col-2">
    <button id="singlebutton" name="singlebutton" class="btn btn-info ">New Entry</button>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Designation: </label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">Managing Partner</option>
      <option value="2">Manager</option>
      <option value="3">Other</option>
    </select>
  </div>
  <div class="col-md-2">
     <input id="textinput" name="textinput" type="text" placeholder="Specify if Other" class="form-control input-md">
</div>

</div>


<!-- Buttons SAve and Cancel -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="button1id" name="button1id" class="btn btn-success" style="width: 10em;">Save</button><span><span></span></span>
    <button id="button2id" name="button2id" class="btn btn-warning" style="width: 10em;">Cancel</button>
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



