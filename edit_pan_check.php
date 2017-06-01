<?php

$db = pg_connect("host=ec2-107-20-191-76.compute-1.amazonaws.com port=5432 dbname=deu9vahl80fvjn user=vdvqpruzihrics password=17b3e7a56da97ca021e3da54bb1694bb799849a2b5911014ed6caa05e1e4e02d");
 pg_select($db, 'post_log', $_POST);


if(isset($_POST['name']))
{
$name=pg_escape_string($_POST['name']);
$query=pg_query("(SELECT pan FROM users_users where pan ILIKE '$name')
    UNION
(SELECT pan FROM organization_organization where pan ILIKE '$name')");
$row=pg_num_rows($query);
if($row==0)
{
echo "<span style='color:green;margin-left: 58%;position: relative;margin-top: -6%;'>.</span>";
echo "<script type='text/javascript'> var btn = document.getElementById('edit_btn'); btn.disabled = false;</script>";

}
else
{
echo "<span style='color: red;margin-left: 58% !important;position: relative;margin-top: -6%;' class='blink_text'>Already Exist's</span>";

echo "<script type='text/javascript'> var btn = document.getElementById('edit_btn'); btn.disabled = true; </script>";
}
}
?>  
<style type="text/css">
    
    .blink_text {

    animation:1s blinker linear infinite;
    -webkit-animation:1s blinker linear infinite;
    -moz-animation:1s blinker linear infinite;

     color: red;
    }

    @-moz-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @-webkit-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }
</style>
