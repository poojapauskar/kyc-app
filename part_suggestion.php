<?php

session_start();

$db = pg_connect("host=ec2-107-20-191-76.compute-1.amazonaws.com port=5432 dbname=deu9vahl80fvjn user=vdvqpruzihrics password=17b3e7a56da97ca021e3da54bb1694bb799849a2b5911014ed6caa05e1e4e02d");
 pg_select($db, 'post_log', $_POST);
 

 $query=pg_query("SELECT is_user,id,name,account_token,is_active FROM users_users WHERE is_active = 'true' AND account_token = '".$_SESSION['account_token']."'");

/*echo $query;*/

 $json=array();
while ($student = pg_fetch_array($query)) {
    $json[$student["is_user"]."-".$student["id"]] = $student["name"];

}

$textval = json_encode($json);
$foo = "var partnames=" . $textval;

file_put_contents('autocomplete-Files/'.$_SESSION['account_token'].'-partners.js', $foo);
echo "<script>location='new.php'</script>";
 

?>