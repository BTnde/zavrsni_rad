<?php include('db-connection.php'); ?>

<?php include('header.php'); ?>

<?php 


if(isset($_POST['submit'])){
    
    $title = $_POST["title"];
    $body = $_POST["body"];
    $author = $_POST["author"];
    $created_at =  date("Y-m-d h:i");

    if(empty($title) || empty($body) || empty($author)){
         echo('Nesto nije u redu');
        return;
    }else{
        $sql = "INSERT INTO posts (title, body, author,created_at) 
        VALUES ('$title', '$body', '$author', '$created_at')";
        $statement = $connection->prepare($sql);
        $statement->execute();

        header("Location: ./index.php"); 
    }
} 

?>

<div align="center">
<form action = "create-post.php" method="POST" id="postsForm" >
        
        <input type="text" name="title" placeholder="Title" id="titlePosts"></input><br><br> 
        <input type="text" name="author" placeholder="author" id="authorPosts"></input><br><br>  
        <textarea name="body" placeholder ="Enter Post" rows = "10" id="bodyPosts"></textarea><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>


<?php include('sidebar.php');?>
<?php include("footer.php"); ?>