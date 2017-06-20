   <?php

session_start();
    header('Content-Type: application/json');

    $aResult = array();

    
    $url_check_session_0 = 'https://kyc-application.herokuapp.com/check_if_session_valid/';
    $options_check_session_0 = array(
      'http' => array(
        'header'  => array(
                      'SESSION-ID: '.$_SESSION['session_id'],
                    ),
        'method'  => 'GET',
      ),
    );
    $context_check_session_0 = stream_context_create($options_check_session_0);
    $output_check_session_0 = file_get_contents($url_check_session_0, false,$context_check_session_0);
    /*echo $output_check_session_0;*/

    $check_session_0 = json_decode($output_check_session_0,true);



    $fields= array();


    if($check_session_0['status'] == 200){
          $f = array(
            "status" => 200
          );
          $fields[] = $f;
          echo json_encode($fields);
       
    }else{
          $f = array(
            "status" => 400
          );
          $fields[] = $f;
          echo json_encode($fields);
    }
?>

