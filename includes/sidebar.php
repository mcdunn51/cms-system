<div class="col-md-4">

    <!--sidebar widget column-->



    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action ="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" type="submit" class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form> 
        <!-- /.input-group -->
    </div>


    <!-- Login -->
    <div class="well">
        <h4>Login</h4>
        <form action ="includes/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username">
            </div>

            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Enter Password">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Login</button>
             </span>

             </div>
            
        </form> 
    </div>

    <!-- Blog Categories Well -->

    <?php

                    $query = "SELECT * FROM categories LIMIT 3";
                    $select_categories_sidebar = mysqli_query($conn, $query);

    ?>

    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php while ($row = mysqli_fetch_assoc($select_categories_sidebar))
                        {

                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                        echo "<li><a href ='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        } 
                    ?>
                   
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!--side widget well-->

    <?php include "widget.php";?>

    
</div>