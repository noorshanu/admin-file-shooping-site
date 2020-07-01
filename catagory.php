<?php 
    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');

?> 


<!-- Modal -->
<div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="catagory_proccess.php" method="POST" >
          
      
      <div class="modal-body">
          
        <div class="form-group">
            <label>category</label>
            <input class="form-control" type="text" name="cat_name" placeholder="category">    
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  name="savebtn" class="btn btn-primary">Save </button>
      </div>
        </form>
    </div>
  </div>
</div>


<div class= "container-fluid">
<!-- Button trigger modal -->
<div class="card shadow mb-4">
    <div class ="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Catagory panel
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcat">
  Add Catagory
</button>
</h6>
</div>

<div class="card-body">
<?php
    if(isset($_SESSION['success']) && $_SESSION['success']!='')
    {
       echo '<h2 class="bg-success">'.$_SESSION['success'].'</h2>';
       unset($_SESSION['success']);

    }

    if(isset($_SESSION['status']) && $_SESSION['status']!='')
    {
       echo '<h3 class="bg-danger">'.$_SESSION['status'].'</h3>';
       unset($_SESSION['status']);

    } 
    
    
    ?>

    
<div class= "table-responsive">

<?php
    $connection=mysqli_connect("localhost","root","","adminpanel");
        $query = "SELECT * FROM catagory";
        $query_run = mysqli_query($connection,$query);
    
    
    ?>

 
<table class="table table-bordered" id = "dataTable" width="100%" cellspacing = "0">
            <thead>
                <tr>
                <th>id</th>
                <th>category</th>

                <th>Edit</th>
                <th>delete</th>

                </tr>
            </thead>
            <tbody>
            <?php
                    if(mysqli_num_rows($query_run)>0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
         
                    <tr>
                    <td><?php echo $row['cat_id'];?></td>
                    <td><?php echo $row['cat_name'];?></td>

                       <td> <form method="POST" action="catagory_edit.php">
                             <input  type= "hidden"class="hidden" type="text" name="edit_id" value="">
                            
                            <button type="submit" class="btn btn-success" name="edit_btn">EDIT</button>
                         </form> 
                         </td>

                        <td> <form method="post" action="catagory_proccess.php">
                             
                          <input class="form-control" type="hidden" name="delete_id" value="">
                         <button type="submit"  name="delete_btn" class="btn btn-danger">DELETE</button>
                         </form>  </td>
          
         </tr> 
  
         <?php
                        }

                        }
                         else
                        {
                        echo "No REcord Found";
                         }
                
               ?>  
             
         </tbody>
        </table>

    </div>
  </div>
 </div>
 </div>




<?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>
  