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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style type="text/css">
    body {
  background: #eee;
  font: 12px Lucida sans, Arial, Helvetica, sans-serif;
  color: #333;
  text-align: center;
}

a {
  color: #2A679F;
}
/*========*/

.form-wrapper {
  background-color: #f6f6f6;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#f6f6f6), to(#eae8e8));
  background-image: -webkit-linear-gradient(top, #f6f6f6, #eae8e8);
  background-image: -moz-linear-gradient(top, #f6f6f6, #eae8e8);
  background-image: -ms-linear-gradient(top, #f6f6f6, #eae8e8);
  background-image: -o-linear-gradient(top, #f6f6f6, #eae8e8);
  background-image: linear-gradient(top, #f6f6f6, #eae8e8);
  border-color: #dedede #bababa #aaa #bababa;
  border-style: solid;
  border-width: 1px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;
  -webkit-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
  -moz-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
  box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
  margin: 100px auto;
  overflow: hidden;
  padding: 8px;
  width: 450px;
}

.form-wrapper #search {
  border: 1px solid #CCC;
  -webkit-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
  -moz-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
  box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  color: #999;
  float: left;
  font: 16px Lucida Sans, Trebuchet MS, Tahoma, sans-serif;
  height: 43px;
  padding: 10px;
  width: 320px;
}

.form-wrapper #search:focus {
  border-color: #aaa;
  -webkit-box-shadow: 0 1px 1px #bbb inset;
  -moz-box-shadow: 0 1px 1px #bbb inset;
  box-shadow: 0 1px 1px #bbb inset;
  outline: 0;
}

.form-wrapper #search:-moz-placeholder,
.form-wrapper #search:-ms-input-placeholder,
.form-wrapper #search::-webkit-input-placeholder {
  color: #999;
  font-weight: normal;
}

.form-wrapper #submit {
  background-color: #0483a0;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#31b2c3), to(#0483a0));
  background-image: -webkit-linear-gradient(top, #31b2c3, #0483a0);
  background-image: -moz-linear-gradient(top, #31b2c3, #0483a0);
  background-image: -ms-linear-gradient(top, #31b2c3, #0483a0);
  background-image: -o-linear-gradient(top, #31b2c3, #0483a0);
  background-image: linear-gradient(top, #31b2c3, #0483a0);
  border: 1px solid #00748f;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
  -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
  box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
  color: #fafafa;
  cursor: pointer;
  height: 42px;
  float: right;
  font: 15px Arial, Helvetica;
  padding: 0;
  text-transform: uppercase;
  text-shadow: 0 1px 0 rgba(0, 0 ,0, .3);
  width: 100px;
}

.form-wrapper #submit:hover,
.form-wrapper #submit:focus {
  background-color: #31b2c3;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#0483a0), to(#31b2c3));
  background-image: -webkit-linear-gradient(top, #0483a0, #31b2c3);
  background-image: -moz-linear-gradient(top, #0483a0, #31b2c3);
  background-image: -ms-linear-gradient(top, #0483a0, #31b2c3);
  background-image: -o-linear-gradient(top, #0483a0, #31b2c3);
  background-image: linear-gradient(top, #0483a0, #31b2c3);
}

.form-wrapper #submit:active {
  -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
  -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
  outline: 0;
}

.form-wrapper #submit::-moz-focus-inner {
  border: 0;
}

      
    </style>
  </head>

<body>
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
      <a href="neworgan.php">
      <button style="background-color:#CCC;width:200px;height:60px" class="mdl-button mdl-js-button mdl-button--raised">
      <p>New Entry<br>Organization</p>
      </button>
      </a>
    </div>
    <div class="col-sm-2" style="width:11.66667%;">
    </div>
    <div class="col-sm-2">
      <a href="newentry.php">
      <button style="background-color:#CCC;width:200px;height:60px" class="mdl-button mdl-js-button mdl-button--raised">
      <p>New Entry<br>Individual</p>
      </button>
      </a>
    </div>
    <div class="col-sm-2" style="width:11.66667%;">
    </div>
    <div class="col-sm-2">
       <a href="missing.php">
       <button style="background-color:#CCC;width:200px;height:60px" class="mdl-button mdl-js-button mdl-button--raised">
       <p>Missing Report</p>
       </button>
       </a>
    </div>
</div>
</div>
</body>
</html>