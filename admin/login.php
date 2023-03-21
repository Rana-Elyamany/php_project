<?php 
//connection
include '../app/config.php';
include '../app/functions.php';
//UI
include '../public/nav.php';
include '../public/head.php';
//section
if(isset($_POST['login'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $hashPassword=sha1($_POST['password']);
    $select="SELECT * FROM `admin` WHERE `name`='$name' and `password`='$hashPassword'";
    $s=mysqli_query($connect,$select);
    $row=mysqli_fetch_assoc($s);
    $numOfRows=mysqli_num_rows($s);
    if($numOfRows==1){
        $_SESSION['admin']=[
            "name"=>$row['name'],
            "role"=>$row['roles'],
            "id"=>$row['id']

        ];
        path("/");
    }
    else{
        echo"False Admin";
    }  
}
if(isset( $_SESSION['admin'])){
    path("/");
}
?>
<div class="w-100 bg-dark py-5">
<div class="container col-9 pt-5">
<h1 class="text-center text-light">Login Page</h1>
    <div class="card my-5">
        <div class="body">
            <form action="" method="POST" class="m-3">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button class="btn btn-success m-3" name="login">log in</button>
            </form>
        </div>
    </div>

</div>
</div>

<?php 
include '../public/footer.php';
include '../public/script.php';
?>