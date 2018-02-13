<?php
require_once 'connect.php';
require_once 'handle.php';

$error = json_encode(array(
    'status' => 'ERROR',
    'message'=>'Wrong request!')
);

if (!empty($_REQUEST['act'])) {

    switch ($_REQUEST['act'])
    {
        case 'create':
            if(!empty($_POST)){
                $answer = create($mysqli, $_POST);
            }
            else{
                $answer = $error;
            }
            print $answer;
            break;
        case 'get':
            if(!empty($_GET)){
                $answer = get($mysqli);
            }else{
                $answer = $error;
            }
            print $answer;
            break;
        case 'update':
            if(!empty($_POST)){
                $answer = update($mysqli, $_POST);
            }
            else{
                $answer = $error;
            }
            print $answer;
            break;
        case 'delete':
            if(!empty($_POST)){
                
                $answer = delete($mysqli, $_POST);
            }
            else{
                $answer = $error;
            }
            print $answer;
            break;
    }
}

?>