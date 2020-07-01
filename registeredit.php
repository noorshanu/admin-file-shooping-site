<?php 
   include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');

?> 
<div class="container-fluid">

   <div class="card shadow mb-4">
     <div class ="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Admin edit Profile

       </h6>
    </div>


   <div class="card-body">
<?php
$connection = mysqli_connect("localhost","root","","adminpanel");


if(isset($_POST['edit_btn']))
{
    $id =$_POST['edit_id'];
    $query = "SELECT * FROM register WHERE id = '$id'";
    $query_run=mysqli_query($connection,$query);
    
    foreach($query_run as $row)
    {
        ?>
    
        <form method="POST" action="code.php" >
            <input class="form-control" type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
            
        
        <div class= "form-group">
            <label>Username</label>
            <input class="form-control" name="edit_username" value="<?php echo $row['username']?>" type="text" name="username" placeholder = "Enter Username">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="edit_email" value="<?php echo $row['email']?>"  type="email" name="email" placeholder="Enter Email id">
         </div>
      
        <div class="form-group">
        <label>Password </label>
        <input class="form-control" name="edit_password" value="<?php echo $row['password']?>"  type="password" name="password" placeholder="password">    
       </div>
       <a href="register.php" class="btn btn-danger">Cancel</a>
       <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
       </form>
      
      <?php
    }
}
?>
            
      </div>
      




  </div> 
</div>
  </div>


















<?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>