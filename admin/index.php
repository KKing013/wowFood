<?php include('partials/menu.php') ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>

        </br></br>

        <?php

        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']); // removing session message

        }


        ?>

        </br></br>

        <div class="col-4 text-center">

        <?php 
                $sql = "SELECT * FROM tbl_category";
                
                $res = mysqli_query($conn, $sql);
                
                $count = mysqli_num_rows($res);
        
        
        ?>
            <h1><?php echo $count ?></h1>
            </br>
            Categories
        </div>

        <?php 
                $sql2 = "SELECT * FROM tbl_food";
                
                $res2 = mysqli_query($conn, $sql2);
                
                $count2 = mysqli_num_rows($res2);
        
        
        ?>

        <div class="col-4 text-center">
            <h1><?php echo $count2 ?></h1>
            </br>
            Foods
        </div>

        <?php 
                $sql3 = "SELECT * FROM tbl_orders";
                
                $res3 = mysqli_query($conn, $sql3);
                
                $count3 = mysqli_num_rows($res3);
        
        
        ?>

        <div class="col-4 text-center">
            <h1><?php echo $count3 ?></h1>
            </br>
            Orders
        </div>


            <?php 

                $sql4 = "SELECT SUM(total) AS Total FROM tbl_orders WHERE status='Delivered'";

                $res4 = mysqli_query($conn, $sql4);

                $row = mysqli_fetch_assoc($res4);

                $total_revenue = $row['Total'];
            
            
            
            ?>




        <div class="col-4 text-center">
            <h1>$<?php echo $total_revenue; ?></h1>
            </br>
            Revenue Generated
        </div>

        <div class="clear-fix"></div>


    </div>
</div>


<!-- Main Content Section Ends -->


<?php include('partials/footer.php') ?>

