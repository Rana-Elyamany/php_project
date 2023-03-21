<?php
include '../app/config.php';
include "../app/functions.php";
include '../public/nav.php';
include '../public/head.php';
if(isset($_GET['edit'])){

    $id=$_GET['edit'];
    $select="SELECT * FROM `admin` where id=$id";
    $selection=mysqli_query($connect,$select);
    $row=mysqli_fetch_assoc($selection);

    if(isset($_POST['send'])){
        $name=$_POST['name'];
        $password=sha1($_POST['password']);
        $update="UPDATE `admin` SET name='$name', password ='$password' where id=$id";
        $i=mysqli_query($connect,$update);
        path('admin/list.php');
    }
    
}
auth(1);
?>
<div class="w-100 bg-dark py-5">
<div class="container col-6  pt-5">
<h1 class="text-center text-light ">Edit Employee Page</h1>

    <div class="card my-5">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mt-2">
                <label for="">Name</label>
                <input type="text" name="name" value="<?= $row['name']?>" class="form-control">
            </div>
                <div class="form-group mt-2">
                <label for="">password</label>
                <input type="text" name="password" value="<?= $row['password']?>" class="form-control">
            </div>
            </div>
            <button class="btn btn-success m-3" name="send">Update</button>
            </form>
    </div>
</div>
</div>
</div>
<?php
include '../public/footer.php';

include '../public/script.php';
?>
