<?php include('db-connection.php') ?>

<div class="comments">
<h3>comments</h3>

<?php
  
  foreach($comments as $comment) {
?>


  
  <div>
    <ul>
      <li><?php echo($comment['text']) ?> <br>
          posted by:<?php echo($comment['author']) ?>
          <hr>
      </li>
    </ul>
  </div>

<?php
  }
?>


<div>
<form action = "create-comment.php" method="POST" id="commentForm" >        
        <input type="text" name="author" placeholder="author" id="authorComment"></input><br><br>        
        <textarea name="body" placeholder ="Enter Comment"  id="bodyComment"></textarea><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>
