<table class="table table-bordered table-hover">
    <thead>

        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Content</th>
            <th>No of Comments</th>
            <th>Status</th>

        </tr>

    </thead>
    <tbody>

           <?php //select all from posts


            $query = "SELECT * FROM posts";
            $selectEachRowFromPosts = mysqli_query($conn, $query);

            while ($row=mysqli_fetch_assoc($selectEachRowFromPosts)) 
            {

                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_content = $row['post_content'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];



                echo "<tr>";
                echo "<td>{$post_id}</td>";

               


                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";

                $select_categories_id = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($select_categories_id))
                { 
                  $cat_id = $row['cat_id'];
                  $cat_title = $row ['cat_title'];


                  echo "<td>{$cat_title}</td>";

              }




              echo "<td>{$post_title}</td>";
              echo "<td>{$post_author}</td>";
              echo "<td>{$post_date}</td>";
              echo "<td><img width='100' src='../images/{$post_image}'</td>";
              echo "<td>{$post_tags}</td>";
              echo "<td>{$post_content}</td>";
              echo "<td>{$post_comment_count}</td>";
              echo "<td>{$post_status}</td>";
              echo "<td><a href ='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
              echo "<td><a href ='posts.php?delete={$post_id}'>Delete</a></td>";


              echo "</tr>";

          }

          ?>



      </tbody>
  </table>
  <?php 
  if(isset($_GET['delete']))

  {

    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";

    $deleteSelectedRowFromPosts = mysqli_query($conn, $query);
    header("Location: posts.php");

}
?>