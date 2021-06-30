<?php include('partials/menu.php') ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /> <br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']); // removing session message

        }
        if (isset($_SESSION['remove_image'])) {
            echo $_SESSION['remove_image'];
            unset($_SESSION['remove_image']); // removing session message

        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']); // removing session message

        }
        if (isset($_SESSION['category-not-found'])) {
            echo $_SESSION['category-not-found'];
            unset($_SESSION['category-not-found']); // removing session message

        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']); // removing session message

        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']); // removing session message

        }
        if (isset($_SESSION['failed-remove'])) {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']); // removing session message

        }

        ?>

        <br /><br />

        <!-- Button to Add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>

            </tr>

            <?php

            $sql = "SELECT * FROM tbl_category";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn = 1;

            if ($count > 0) {

                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

            ?>

                    <tr class="row-hover">

                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>

                        <td>
                            <?php

                            if ($image_name != "") {
                            ?>

                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" width="50px">

                            <?php

                            } else {
                                echo "<div class='error'>No Image Found</div>";
                            }






                            ?>
                        </td>

                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                        </td>

                    </tr>

                <?php

                }
            } else {
                ?>
                <tr>
                    <td colspan="6">
                        <div class="error">No Category Added</div>

                    </td>

                </tr>

            <?php

            }

            ?>

        </table>

    </div>
</div>
<!-- Main Content Section Ends -->

<?php include('partials/footer.php') ?>