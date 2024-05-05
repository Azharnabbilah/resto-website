<?php 
    //Include Constans File
    include('../config/constans.php');

    //echo "Delete Page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and delete
        //echo "Get the Value and Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file is available
        if($image_name != "")
        {
            //image is available. so remove it
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Categpry Image.</div>";
                //redirect to manage category page
                header('location'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
        }

        //delete data from database
        //SQL Query to delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is delete from database or not
        if($res==true)
        {
            //Set Succes message and redirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //Set Failed message and redirect
            $_SESSION['delete'] = "<div class='success'>Failed to Delete Category.</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        //redirect to manage category page with message

    }
    else
    {
        //Redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>