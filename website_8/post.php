<?php

require('db.php');
require('config.php');

//get Id

$id = mysqli_real_escape_string($conn ,$_GET['id']);



//creat Query
$query = 'SELECT * FROM posts WHERE id = ' . $id;


//Get Result
$result = mysqli_query($conn , $query);


//Fetch Data
$post = mysqli_fetch_assoc($result) ;


//free Result
mysqli_free_result($result) ;

 //close Connection
 mysqli_close($conn) ;

?>

<?php include('inc/header.php'); ?>
    
<div class="container">

<a href="<?php echo ROOT_URL ; ?>" class="btn btn-default">Back</a>
<h1> <?php echo $post['titel']; ?> </h1>


<small>Created on <?php echo $post['created_at']; ?> by
<?php echo $post['author'] ; ?> </small>
<p> <?php echo $post['body']; ?> </p>



</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<?php include('inc/footer.php'); ?>