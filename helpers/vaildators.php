<?php

function clean($inputval){
    $input=stripslashes($inputval);
    $input=htmlspecialchars($inputval);
    $input=trim($inputval);

    return $input;
}

function validate($input ,$flag ,$length=6){
    $status=true;
    switch ($flag){
        case 1:
            if(empty($input)){
                $status=false;
            }
            break;
        case 2:
            if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                $status=false;
            }
            break;
        case 3:
            if(strlen($input)<$length){
                $status=false;
            }
            break;
        case 4:
            if(!filter_var($input,FILTER_VALIDATE_URL)){
                $status=false;
            }
            break;
        case 5:
            if(!filter_var($input,FILTER_VALIDATE_INT)){
                $status=false;
            }
            break;
        case 6:
            $allawed_indexs=['png','jpg','jpeg','x-icon'];
            if(!in_array($input,$allawed_indexs)){
                $status=false;
            }
            break;
        case 7:
            $allawed_indexs=['mp3','ogg','flac','mpeg'];
            if(!in_array($input,$allawed_indexs)){
                $status=false;
            }
            break;

    }
    return $status;
}

?>