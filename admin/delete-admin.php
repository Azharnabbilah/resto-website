<?php 
    
    //Include constans.php file here
    include('../config/constans.php');

    //1. get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed succesfully or not
    if($res==true)
    {
        //Query executed succesfully and admin deleted
        //echo "Admin Deleted";
        //Create Session variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Succesfully.</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete admin
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. Redirect to manage admin page with message (succes/error)

?>