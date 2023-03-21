<?php
include '../app/config.php';
include "../app/functions.php";
include '../public/nav.php';
include '../public/head.php';
$roles="SELECT * FROM `roles`";
$rolesData=mysqli_query($connect,$roles);
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $hashPassword=sha1($_POST['password']);
    $password=$hashPassword;
    $role=$_POST['role'];
    $insert="INSERT INTO `admin` VALUES(NULL,'$name','$password',$role)";
    $i=mysqli_query($connect,$insert);
    testMessage($i,"insert");
    path('admin/list.php');
}
auth(1);

?>
<div class="w-100 bg-dark py-5">
<div class="container col-6  pt-5">

<h1 class="text-light text-center ">Add Admin Page</h1>
    <div class="card my-5">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group mt-2">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="">Password</label>
                <input type="text" name="password" class="form-control">
            </div> 
            <div class="form-group mt-2">
                <label for="">role</label>
                <select name="role" class="form-control" id="">
                    <?php foreach($rolesData as $data): ?>
                    <option value="<?= $data['id'] ?>"><?= $data['description'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div> 
            </div>
            <button class="btn btn-success mt-1 " name="send">Send Admin</button>
            </form>
    </div>
</div>
</div>
<?php
include '../public/footer.php';

include '../public/script.php';
?>
