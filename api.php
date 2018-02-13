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
                $answer = create($link, $_POST);
            }
            else{
                $answer = $error;
            }
            print $answer;
            break;
        case 'get':
            if(!empty($_GET)){
                $answer = get($link);
            }else{
                $answer = $error;
            }
            print $answer;
            break;
        case 'update':
            if(!empty($_POST)){
                $answer = update($link, $_POST);
            }
            else{
                $answer = $error;
            }
            print $answer;
            break;
        case 'delete':
            if(!empty($_POST)){
                
                $answer = delete($link, $_POST);
            }
            else{
                $answer = $error;
            }
            print $answer;
            break;
    }
}

?>