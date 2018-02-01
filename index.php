<?php include "includes/db.php"; ?> 
<?php include "includes/header.php"; ?>


<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">
    <h1 class="page-header text-center">
                Matt's blog
                </h1>
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8 column-eight">
            <?php 
             

                $query = "SELECT * FROM posts WHERE post_status = 'Finished' ";
                $select_all_posts_query = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0,150);
                    $post_status = $row['post_status'];


                    if($post_status !== 'Finished')
                    {
                        echo "<H1>No post sorry</H1>";
                    
                    } else {
            ?>

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
            <hr>
            <p><?php echo $post_content?></p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            <?php } }?>
        </div> <!-- Closes column-eight -->
        <?php include "includes/sidebar.php"; ?>
    </div>
    <?php include "includes/footer.php"; ?>
    <!-- Blog Sidebar Widgets Column -->
    <hr>
</div>
