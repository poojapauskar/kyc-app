<?php

session_start();

fopen('autocomplete-Files/'.$_SESSION['account_token'].'.js', 'w');
echo "<script>location='search.php'</script>";
 

?>