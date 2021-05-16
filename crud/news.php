<?php
    include('header.php');
    include('connect.php');
    include('process.php');
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CRUD Form</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> -->
    </ul>
    <form class="form-inline my-2 my-lg-0" action="process.php" method='posts'>
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name='search'>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name='sear'>Search</button>
    </form>
  </div>
</nav>
<?php
    if(isset($_SESSION['massage'])): 
?>
    <div class="alert alert-<?php echo $_SESSION['role'];?>" role="alert">
           <?php 
                echo $_SESSION['massage']; 
                unset($_SESSION['massage']);
           ?>
    </div>
<?php endif; ?>
    <!-- <div class="alert alert-danger" role="alert">
    A simple danger alert—check it out!
    </div> -->
<div class="container">
            <div class="row">
                <div class="col-sm-8" style="margin-top:20px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Passowrd</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  
                            $query = "SELECT * FROM data";
                            $execute = mysqli_query($conn , $query);
                            while($row = mysqli_fetch_assoc($execute))
                            {
                        ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['password'];?></td>
                                <td>
                                    <a href="news.php?edit=<?php echo $row['id'];?>" class="btn btn-primary">EDIT</a>
                                    <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>

                </div>
                <div class="col-sm-4" style="margin-top:20px">
                <form action="process.php" method="post">
                <input type="hidden" name="id" value="<?php if(isset($_GET['edit'])){echo $id;}
                                                             else
                                                            ?>">
                        <label class="text text-primary" style=" font-size:30px; justify-content:center; display:flex">Add Record</label>
                    <div class="form-group">

                        <input type="text" name="name" class="form-control" value = "<?php echo $name;?>" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" value = "<?php echo $email;?>" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                    <?php if($bool): ?>
                        <input type="text"  name="password" class="form-control" value = "<?php echo $password;?>" placeholder="Enter Password">
                    <?php else: ?>
                        <input type="password"  name="password" class="form-control" value = "<?php echo $password;?>" placeholder="Enter Password">
                    <?php endif; ?>
                    </div>
                    <div class="form-group form-check">
                    </div>
                    <?php if($bool): ?>
                        <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary" name="save">SAVE</button>
                    <?php endif; ?>
                </form>
                </div>

            </div>
        </div>
</body>