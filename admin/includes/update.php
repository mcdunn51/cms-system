<form action="" method="post" name="update_category">
                                <div class ="form-group">
                                    <label for="update_category">Edit category</label>

                            <?php //Edit query 

                            if(isset($_GET['edit']))
                            {
                                $cat_id = $_GET['edit'];
                                //

                                $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                $select_categories_id = mysqli_query($conn, $query);


                                while ($row = mysqli_fetch_assoc($select_categories_id))
                                { 

                                $cat_id = $row['cat_id'];
                                $cat_title = $row ['cat_title'];

                            ?>
                                   <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">


                            <?php 

                                }}

                            ?>



                            <?php //UPDATE QUERY

                            if(isset($_POST['update_category']))
                                {

                                    $the_cat_title = $_POST['cat_title'];
                                                                   

                                    $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
                                    $update_query = mysqli_query($conn, $query);

                                }


                            ?>

                           </div>

                           <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_category" value="update category">

                            </div>
                    </form>
