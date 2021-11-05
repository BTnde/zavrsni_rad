<?php include('db-connection.php') ?>
<?php include('header.php');?>


<main role="main" class="container">

<div class="row">

    <div class="col-sm-8 blog-main">

        <div class="blog-post">

            <?php

             
                $sql ="SELECT p.id, p.title, p.created_at
                FROM posts as p 
                ORDER BY p.created_at DESC";
                $statement = $connection->prepare($sql);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $posts = $statement->fetchAll();
                
               
            ?>

            <?php
                foreach ($posts as $post) {
            ?>

                <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($post['id']) ?>">
                            <?php echo($post['title']) ?></a></h2>
                <p class="blog-post-meta"><?php echo($post['created_at']) ?>  by 
                <a href="#"><?php echo($post['author']) ?></a></p>

                    
            <?php
                }
            ?>


            <div class="va-c-paginator">
                <a href="posts.php" title="All posts">All posts</a>
            </div>    
        </div>
    </div>

</main>   
    
    
<?php include('sidebar.php'); ?>
<?php include('footer.php'); ?>

</body>
</html>

            