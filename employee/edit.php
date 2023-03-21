<?php
include '../app/config.php';
include "../app/functions.php";
include '../public/nav.php';
include '../public/head.php';
$select="SELECT *FROM `department`";
$selectDepart=mysqli_query($connect,$select);
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $select="SELECT * FROM `employeeWithDepartment` where id=$id";
    $selection=mysqli_query($connect,$select);
    $row=mysqli_fetch_assoc($selection);
    if(isset($_POST['send'])){
        $name=$_POST['name'];
        $salary=$_POST['salary'];

        if(!empty($_FILES['image']['name'])){
        $imageName=time().$_FILES['image']['name'];
        $imageTmpName=$_FILES['image']['tmp_name'];
        $location="upload/".$imageName;
        move_uploaded_file($imageTmpName,$location);
        $image_name=$row['image'];
        unlink("./upload/$image_name");
        }
        else{
            $imageName=$row['image'];
        }
        $departID=$_POST['departID'];
        $insert="UPDATE `employee` SET name='$name', salary=$salary ,imageName='$imageName', departmentID= $departID where id=$id";
        $insertion=mysqli_query($connect,$insert);
        path('employee/list.php');
    }
}
auth(2);

?>
<div class="w-100 bg-dark py-5">
<div class="container col-6  pt-5">
<h1 class="text-center text-info ">Edit Employee Page</h1>

    <div class="card my-5">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mt-2">
                <label for="">Name</label>
                <input type="text" name="name" value="<?= $row['empName']?>" class="form-control">
            </div>
                <div class="form-group mt-2">
                <label for="">Salary</label>
                <input type="text" name="salary" value="<?= $row['salary']?>" class="form-control">
            </div>
                            <!-- Update Image -->
                            <label for="">Image : </label><span><img width="80px" src="./upload/<?=$row['image']?>" alt=""></span>
                <div class="form-group mt-2">
                <input type="file" name="image" class="form-control">
            </div>
                <div class="form-group mt-2">
                <label for="">departmentID</label>
                <select name="departID" id="" class="form-control">
                <option selected value="<?=$row['departid']?>"><?=$row['departName']?></option>    
                <?php foreach($selectDepart as $data):?>
                    <option value="<?=$data['id']?>"><?=$data['name']?></option>
                    <?php endforeach?>
                </select>
            </div>
            <button class="btn btn-info m-3" name="send">Update</button>
            </form>
    </div>
</div>
</div>
</div>
<?php
include '../public/footer.php';
include '../public/script.php';
?>
