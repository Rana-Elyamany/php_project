<?php
include '../app/config.php';
include "../app/functions.php";
include '../public/nav.php';
include '../public/head.php';
auth();
$select="SELECT * FROM `adminroles`";
$selection=mysqli_query($connect,$select);
if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $delete="DELETE FROM `admin` WHERE `id`=$id ";
    $deletion=mysqli_query($connect,$delete);
    path('admin/list.php');
}

auth(1);

?>
<div class="w-100 bg-dark py-5">
<div class="container col-9 pt-5">
<h1 class="text-center text-light ">List Admin Page</h1>

    <div class="card my-5">
        <div class="card-body">
            <table id="myTable" class="table ">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Role</th>

                    <th colspan="2" class="text-center">Action</th>
                </tr>
                <?php foreach($selection as $data):?>
                    <tr>
                        <td><?=$data['id']?></td>
                        <td><?=$data['name']?></td>
                        <td><?=$data['description']?></td>
                        
                        <td><a class="dropdown-item text-success"  href="/com/admin/edit.php?edit=<?=$data['id']?>">Edit</a></td>
                        <td><a class="dropdown-item text-danger"  onclick="return confirm('Are you Sure?')" href="/com/admin/list.php?delete=<?=$data['id']?>">Remove</a></td>
                        
                    </tr>
                    <?php endforeach ;?>
            </table> 
        </div>
    </div>
</div>
</div>

<?php
include '../public/footer.php';

include '../public/script.php';
?>