<?php

require('db.php');
require('config.php');

//creat Query
$query = 'SELECT * FROM posts ORDER BY created_at DESC';


//Get Result
$result = mysqli_query($conn , $query);

//Fetch Data
$posts = mysqli_fetch_all($result , MYSQLI_ASSOC) ;
//var_dump($posts);


//free Result
mysqli_free_result($result) ;

 //close Connection
 mysqli_close($conn) ;

?>

<?php include('inc/header.php'); ?>
    
<div class="container">


<h1> Posts </h1>

<?php foreach($posts as $post) : ?>
<div class="well">
<h3><?php echo $post['titel']; ?></h3>
<small>Created on <?php echo$post['created_at']; ?> by
<?php echo $post['author'] ; ?> </small>
<p> <?php echo $post['body']; ?> </p>

<a class="btn btn-default" href="<?php echo ROOT_URL?>
 post.php?id=<?php
echo $post['id'];?>" >Read More</a>

</div>

<?php endforeach; ?>


</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php include('inc/footer.php'); ?>