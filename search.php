<html>
  <head>
    <!---bootstrap-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
  </head>

<body>

<a href="index.php" class="btn btn-default btn-sm" style="margin-left:60%;margin-top:4%;">
<span class="glyphicon glyphicon-log-out"></span> Log out
</a>

 <div class="container">
  <div class="row" style="margin-top:4%;margin-left:4%"> 
    <form class="form-wrapper">
    <input type="text" id="search" placeholder="Search firm,Individual
    " required>
    <input type="submit" value="Search" id="submit">
    </form>

    <div class="col-sm-1">
    </div>
    <div class="col-sm-2">
      <a href="new_organization.php">
      <button style="background-color:#CCC;width:200px;height:60px" class="mdl-button mdl-js-button mdl-button--raised">
      <p>New Entry<br>Organization</p>
      </button>
      </a>
    </div>
    <div class="col-sm-2" style="width:11.66667%;">
    </div>
    <div class="col-sm-2">
      <a href="new_user.php">
      <button style="background-color:#CCC;width:200px;height:60px" class="mdl-button mdl-js-button mdl-button--raised">
      <p>New Entry<br>Individual</p>
      </button>
      </a>
    </div>
    <div class="col-sm-2" style="width:11.66667%;">
    </div>
    <div class="col-sm-2">

       <a href="missing_reports.php">
       <button style="background-color:#CCC;width:200px;height:60px" class="mdl-button mdl-js-button mdl-button--raised">
       <p>Missing Report</p>
       </button>
       </a>
    </div>
</div>
</div>
</body>
</html>