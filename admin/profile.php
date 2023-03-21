<?php
include '../app/config.php';
include "../app/functions.php";
include '../public/nav.php';
include '../public/head.php';


$adminId=$_SESSION['admin']['id'];
$select ="SELECT * FROM adminsalldata WHERE adminID=$adminId";
$s=mysqli_query($connect,$select);
$row=mysqli_fetch_assoc($s);

if(isset($_POST['send'])){

    $imageName=rand(0,1000).rand(0,1000).$_FILES['image']['name'];
    $imageTmpName=$_FILES['image']['tmp_name'];
    $location="upload/".$imageName;
    $img_Value=$_FILES['image']['name'];

    if(empty($_FILES['image']['name'])){
        $imageName=$row['image'] ;
    }else{
        move_uploaded_file($imageTmpName,$location);
        $imgOldName=$row['image'];
        if($imgOldName!="fake.jpg"){
            unlink("./upload/$imgOldName");
        }
    }
    $update="UPDATE admin SET image='$imageName' WHERE id=$adminId";
    $i=mysqli_query($connect,$update);
    path("admin/profile.php");
}

auth(2,3);
?>
<div class="w-100 bg-dark py-5">
<div class="container col-4 pt-5 px-1">
<h1 class="text-center text-light "> Admin Profile</h1>

    <div class="card my-5">
        <img src="./upload/<?= $row['image'] ?>" alt="" class="img-top">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Upload New Image
        </button>
        <div class="card-body">
            <h1> Name :<?=$row['name'] ?></h1>
            <h1> Role :<?=$row['description'] ?></h1>
        </div>
        <a href="/com/admin/editProfile.php" class="text-light bg-success text-center py-3">Edit Your Profile</a>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="bg-dark">
  <div class="modal-dialog ">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Your Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card ">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">            
                    <div class="form-group mt-2">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                
                <button class="btn btn-success mt-1 " name="send">Send</button>
                </form>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include '../public/footer.php';

include '../public/script.php';
?>