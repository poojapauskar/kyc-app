<?php
$db = pg_pconnect("host=ec2-107-20-191-76.compute-1.amazonaws.com port=5432 dbname=deu9vahl80fvjn user=vdvqpruzihrics password=17b3e7a56da97ca021e3da54bb1694bb799849a2b5911014ed6caa05e1e4e02d");
 pg_select($db, 'post_log', $_POST);
 	
 $term=$_GET["term"];
 
 $query=pg_query("SELECT name FROM organization_organization 
 	UNION 
 	SELECT name FROM users_users where name like '%".$term."%' order by name ");
 $json=array();
 
    while($student=pg_fetch_array($query)){
         $json[]=array(
                    'value'=> $student["name"],
                    'label'=>$student["name"]);
    }
 
 echo json_encode($json);
 
?>