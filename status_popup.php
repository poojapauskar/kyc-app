<!DOCTYPE html>
<html>
<head>
	<title>Status</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="css/material.css">
    <link rel="stylesheet" href="css/fileupload.css">
     <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style type="text/css">
	
	.status-label{
	padding-left: 0px;
    padding-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    left: 336px;
    right: 0px;
	}

	.comment-label{
	padding-left: 0px;
    padding-right: 0px;
    margin-bottom: 0px;
    margin-top: 37px;
    left: 1px;
    margin-left: 314px;
    position: absolute;	
}

.textarea-properties{
	resize: none;
    margin-left: 416px;
    width: 270px;
    margin-top: 10px;
}
</style>
</head>
<body>
<br><br>		
<div>
 <!--  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> -->
 <!--  <form method="post" action="new_user.php">  -->
  <label class="col-md-4 control-label status-label" for="selectbasic">Status:</label>
  <div class="col-md-4">
    <select id="statuss" name="status[]" class="form-control" style="width: 270px;">
      <option value="Pending">Pending</option>
      <option value="Work in process">Work in process</option>
      <option value="Completed">Completed</option>
    </select>
  </div>

   <label class="col-md-4 control-label comment-label" for="textinput">Comment:</label>
<!--   <input type="text" name="uid_in_popup"></input><br><br>
 -->  <textarea rows="4" cols="20" class="textarea-properties"></textarea><br>
  <button id="done" class="btn btn-success" name="done" onclick="">Done</button>
  <button onclick="" style="" id="cancel_btn" class="btn btn-warning" name="cancel1">Cancel</button>
  <!-- </form> -->
</div>
</body>
</html>