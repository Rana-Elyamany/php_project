<?php
function testMessage($condition,$message){
    if($condition){
        echo"
        <div class='text-center alert alert-success col-5 mx-auto'>$message Successfully</div>
        ";
    }
    else
    {
        echo"
        <div class='text-center alert alert-danger col-5 mx-auto'>$message Successfully</div>
        ";
    }
}
function path($go){
    echo "<script>location.replace('/com/$go')</script>";
}

function auth( $num1=null, $num2=null){
    if($_SESSION['admin']){
        if($_SESSION['admin']['role']== 1 ||$_SESSION['admin']['role']== $num1||$_SESSION['admin']['role']== $num2){

        }else{
            path('public/403.php');
        }
    } else{
        path("admin/login.php");
    }   
}

function filterValidation($inputValue){
    $inputValue=trim($inputValue);
    $inputValue=strip_tags($inputValue);
    $inputValue=htmlspecialchars($inputValue);
    $inputValue=stripslashes($inputValue);
return $inputValue;

}

function stringValidation($inputValue){
    $empty=empty($inputValue);
    $length=strlen($inputValue)<3;

    if($empty==true|| $length==true){
        return true;
    }else{
        return false;
    }
}

function numberValidation($inputValue){
    $empty=empty($inputValue);
    $isNumber=filter_var($inputValue, FILTER_VALIDATE_INT)==false;
    $isnegative=$inputValue <0;
    if($empty==true|| $isNumber==true || $isnegative==true){
        return true;
    }else{
        return false;
    }
}
function filevalidationSize($fileSize,$size){
    $file_validation_size=($fileSize/1024)/1024;
    if($file_validation_size>$size){
        return true;
    }else{
        return false;
    }
}

function imageTypevalidation($image_input){
    if($image_input=="image/jpeg" || $image_input=="image/jpg" ||$image_input=="image/png" || $image_input=="image/jif"){
        return false;
    }else{
        return true;
    }
}
?>
