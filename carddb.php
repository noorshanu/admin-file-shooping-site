<?php
include('security.php');


$connection = mysqli_connect("localhost","root","","adminpanel");


if(isset($_POST['savebtn']))
{
    $category=$_POST['category'];
    $sub_category=$_POST['sub_category'];
    $product_name=$_POST['product_name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $images=$_FILES['images']['name'];

    $query="INSERT INTO cards (category,sub_category,product_name,price,description,images) VALUES ('$category','$sub_category','$product_name',' $price','$description','$images')";
    $query_run = mysqli_query($connection,$query);
    if($query_run)
    {
        move_uploaded_file($_FILES["images"]["tmp_name"],"upload/".$_FILES["images"]["name"]);

        $_SESSION['success'] = "iteam added";
        header('location:cards.php');
    }
    else
    {
        $_SESSION['status'] = "iteam not added";
        header('location:cards.php');

    }
}




if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    
    $category=$_POST['edit_category'];
    $sub_category=$_POST['edit_sub_category'];
    $product_name=$_POST['edit_product_name'];
    $price=$_POST['edit_price'];
    $description=$_POST['edit_description'];

    $query ="UPDATE cards SET category='$category',sub_category='$sub_category',product_name='$product_name',price='$price',description='$description' WHERE id='$id'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success']="Updated";
        header('location:cards.php');

    }
    else
    {
        $_SESSION['status']="Not Updated";
        header('location: cards.php');

    }
}


if(isset($_POST['delete_btn']))
{
    $id=$_POST['delete_id'];
    $query="DELETE  FROM cards WHERE id='$id' ";
    $query_run=mysqli_query($connection,$query);
    if($query)
    {
        
        $_SESSION['success']="Deleted";
        header('location:cards.php');

    }
    else
    {
        $_SESSION['status']="Not Deleted";
        header('location:cards.php');

    }
}









?>