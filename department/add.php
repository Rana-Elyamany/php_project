<?php 
//connection
include '../app/config.php';
include '../app/functions.php';
//UI
include '../public/nav.php';
include '../public/head.php';

if(isset($_POST['send'])){
$name=$_POST['name'];
if(empty($name)){
    echo"please enter Department name";
}else{
    $insert="INSERT INTO `department` values(NULL,'$name',Default)";
    $insertion=mysqli_query($connect,$insert);
    testMessage($insertion,"Insertion");
}

}
auth(2,3);

?>
<div class="w-100 bg-dark py-5">
<div class="container col-6 pt-5">

<h1 class="text-light text-center">Add department Page</h1>
    <div class="card">
        <div class="body">
            <form action="" method="POST" class="m-3">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <button class="btn btn-success m-3" name="send">send</button>
            </form>
        </div>
    </div>
</div>
</div>
<?php
include '../public/footer.php';

include '../public/script.php';
?>