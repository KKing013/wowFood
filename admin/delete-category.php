<?php 

include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name != "")
    {
        $path = "../images/category/".$image_name;

        $remove_image = unlink($path);

        if($remove_image == false)
        {
            $_SESSION['remove_image'] = "<div class='error'>Failed to remove image</div>";

            header('location:' . SITEURL . 'admin/manage-category.php');

            die();
        }
    }

    $sql = "DELETE FROM tbl_category WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res == true) 
    {
        $_SESSION['delete'] = "<div class='success'>Successfully Deleted Category</div>";
        header('location:'. SITEURL . 'admin/manage-category.php');
    

    }
    else 
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Category</div>";
        header('location:'. SITEURL . 'admin/manage-category.php');

    }



}
else 
{
    header('location:' . SITEURL . 'admin/manage-category.php');

}












?>