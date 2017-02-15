<?php
$url_search = 'https://kyc-application.herokuapp.com/search/';
$options_search = array(
  'http' => array(
    'header'  => array(
                  'TEXT: Pooja',
                ),
    'method'  => 'GET',
  ),
);
$context_search = stream_context_create($options_search);
$output_search = file_get_contents($url_search, false,$context_search);
/*echo $output_search;*/
$arr_search = json_decode($output_search,true);
/*echo $arr_search;*/

echo $arr_search['response'][0]['voter_id_details'][0]['name'];
echo $arr_search['response'][0]['voter_id_details'][0]['link'];
echo $arr_search['response'][0]['user_details']['uid'];
echo $arr_search['response'][0]['user_details']['address'];
echo $arr_search['response'][0]['user_details']['name'];
echo $arr_search['response'][0]['user_details']['designation'];
echo $arr_search['response'][0]['user_details']['pan'];
echo $arr_search['response'][0]['user_details']['aadhar_no']
?>