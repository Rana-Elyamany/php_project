<?php
include '../app/config.php';
include "../app/functions.php";
include '../public/nav.php';
include '../public/head.php';
$select="SELECT *FROM `department`";
$selection=mysqli_query($connect,$select);
$errors=[];
if(isset($_POST['send'])){
    $name=filterValidation($_POST['name']);
    $salary=filterValidation($_POST['salary']);
    $departID=filterValidation($_POST['departID']);
    //uplaod file
    $image_type=$_FILES['image']['type'];
    $image_size=$_FILES['image']['size'];

    if(filevalidationSize($image_size,2)){
        $errors[]="image should be less than 2 mega";
    }
    if(imageTypevalidation($image_type)){
        $errors[]="image type must be jpeg , jpg, png or jif";
    }
    $imageName=rand(0,1000).rand(0,1000).$_FILES['image']['name'];
    $imageTmpName=$_FILES['image']['tmp_name'];
    $location="upload/".$imageName;
    $img_Value=$_FILES['image']['name'];
    
    
    move_uploaded_file($imageTmpName,$location);


    if(stringValidation($img_Value) ){
        $errors[]="please enter an image";
    }
    if(stringValidation($name) ){
        $errors[]="please enter valid name and name>3";
    }
    if(numberValidation($salary)){
        $errors[]="please enter valid salary";
    }
    if(empty($errors)){
        move_uploaded_file($imageTmpName,$location);
        $insert="INSERT INTO `employee` VALUES(NULL,'$name',$salary,'$imageName',$departID,default)";
        $insertion=mysqli_query($connect,$insert);
        testMessage($insertion,"insert");
    }
    
}
print_r($_FILES);
auth(2);

?>
<div class="w-100 bg-dark py-5">
<div class="container col-6  pt-5">

<h1 class="text-light text-center ">Add Employee Page</h1>
<?php if(!empty($errors)):?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors as $data) :?>
            <li>
                <?= $data?>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>
    <div class="card ">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group mt-2">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="">Salary</label>
                <input type="text" name="salary" class="form-control">
            </div>
                        
            <div class="form-group mt-2">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="">departmentID</label>
                <select name="departID" id="" class="form-control">
                    <?php foreach($selection as $data):?>
                    <option value="<?=$data['id']?>"><?=$data['name']?></option>
                    <?php endforeach?>
                </select>
            </div>
            <button class="btn btn-success mt-1 " name="send">Send</button>
            </form>
    </div>
</div>
</div>
<?php
include '../public/footer.php';

include '../public/script.php';
?>
