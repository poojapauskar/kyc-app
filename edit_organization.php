<?php
$url_search = 'https://kyc-application.herokuapp.com/search/';
$options_search = array(
  'http' => array(
    'header'  => array(
                  'TEXT: bit',
                ),
    'method'  => 'GET',
  ),
);
$context_search = stream_context_create($options_search);
$output_search = file_get_contents($url_search, false,$context_search);
/*echo $output_search;*/
$arr_search = json_decode($output_search,true);
/*echo $arr_search;*/

echo $arr_search['response'][0]['pass_book_details'][0]['name'];
echo $arr_search['response'][0]['pass_book_details'][0]['link'];
echo $arr_search['response'][0]['organization_details']['name'];
echo $arr_search['response'][0]['organization_details']['address'];
echo $arr_search['response'][0]['organization_details']['registration'];
echo $arr_search['response'][0]['organization_details']['type_of_org'];
echo $arr_search['response'][0]['organization_details']['pan'];
echo $arr_search['response'][0]['organization_details']['no_of_partners'];

echo $arr_search['response'][0]['partner_details'][0]['detail'][0]['name'];
echo $arr_search['response'][0]['partner_details'][0]['detail'][0]['designation'];
echo $arr_search['response'][0]['partner_details'][1]['detail'][0]['name'];
echo $arr_search['response'][0]['partner_details'][1]['detail'][0]['designation'];
?>