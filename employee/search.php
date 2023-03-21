<?php
include '../app/config.php';
include "../app/functions.php";
include '../public/nav.php';
include '../public/head.php';
if(isset($_GET['search'])){
    $name=$_GET['nameValue'];
    $select="SELECT *FROM `employeewithdepartment` WHERE empName LIKE '%$name%'";
    $selection=mysqli_query($connect,$select);
}
auth(2);
?>
<div class="w-100 bg-dark py-5">

<h1 class="text-center text-light  display-1 mt-5 pt-5">Add Employee Page</h1>
<div class="container col-9">

<form action="./search.php" method="GET" >
    <div class="row mt-5 my-3">
        <div class="col-md-10">
        <div class="form-group" >
            <input type="text" id="myInput" name="nameValue" placeholder="Search" class="form-control p-2 " >
        </div>
        </div>
        <div class="col-md-2">
            <div class="d-grid">
            <button name="search"  class="btn btn-success">Search</button>
            </div>
        </div>

        </div>

    </form>
    <div class="card ">
        <div class="card-body">
            <table class="table" id="myTable">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Image</th>
                    <th>departmentID</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
                <?php foreach($selection as $data):?>
                    <tr>
                        <td><?=$data['id']?></td>
                        <td><?=$data['empName']?></td>
                        <td><?=$data['salary']?></td>
                        <td><img width="80px" src="./upload/<?=$data['image']?>" alt=""></td>
                        <td><?=$data['departName']?></td>
                        <td><a class="btn btn-success" href="/com/employee/edit.php?edit=<?=$data['id']?>">Edit</a></td>
                        <td><a onclick="return confirm('Are you Sure?')" class="btn btn-danger" href="/com/employee/list.php?delete=<?=$data['id']?>">Remove</a></td>
                    </tr>
                    <?php endforeach ;?>
            </table> 
        </div>
    </div>
</div>
</div>
<?php
include '../public/script.php';
?>
