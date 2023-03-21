<?php 
//connection
include '../app/config.php';
include '../app/functions.php';
//UI
include '../public/nav.php';
include '../public/head.php';
$select="SELECT *FROM `department`";
$selection=mysqli_query($connect,$select);
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE FROM `department` WHERE `id`=$id ";
    $deletion=mysqli_query($connect,$delete);
    path("department/list.php");
}
auth(2,3);

?>
<div class="w-100 bg-dark pt-5">
    <h1 class="text-center text-light display-1 mt-5 pt-5">List Department</h1>
    <div class="container col-9 mb-5">
    <div class="card">
        <div class="body">
            <table class="table p-5">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>created_at</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
                <?php
                foreach($selection as $data):?>
                    <tr>
                        <td><?=$data['id']?></td>
                        <td><?=$data['name']?></td>
                        <td><?=substr($data['created_at'],10,9)?></td>
                    <td>
                    <a href="/com/department/edit.php?edit=<?=$data['id']?>" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                    <a onclick="return confirm('Are you Sure?')" href="/com/department/list.php?delete=<?=$data['id']?>" class="btn btn-danger">Remove</a>
                    </td>
                    </tr>
                    
                <?php endforeach?>
            </table>
        </div>
    </div>
</div>
<?php
include '../public/footer.php';

include '../public/script.php';
?>