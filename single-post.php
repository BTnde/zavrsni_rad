<?php include('db-connection.php'); ?>

<?php include('header.php'); ?>


<?php
                if (isset($_GET['post_id'])) {


                    $sql1 = "SELECT p.id, p.title, p.body, p.created_at, p.author 
                    FROM posts as p
                    WHERE p.id = {$_GET['post_id']}";
                    $statement = $connection->prepare($sql1);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $singlePost = $statement->fetch();
                    

                    $sql2 = "SELECT c.id, c.author, c.text, c.post_id 
					FROM comments AS c  
					WHERE c.post_id = {$_GET['post_id']}";
                    $statement = $connection->prepare($sql2);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $comments =  $statement->fetchAll();

                    
?>

                <div class="blog-post">
                <h2 class="blog-post-title"><a><?php echo($singlePost['id']) ?>
                            <?php echo($singlePost['title']) ?></a></h2>
                <p class="blog-post-meta"><?php echo($singlePost['created_at']) ?>  by 
                <a href="#"><?php echo($singlePost['author']) ?></a></p>
                        
                        <div>
                            <p><?php echo $singlePost['body'] ?></p>
                        </div>
                </div>
					<?php
                } else {
                    echo('post_id nije prosledjen kroz $_GET');
                }
            ?>
			

        
    
    <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
<?php include('comments.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('footer.php'); ?>



