 <?php

require('db.php');
require('config.php');


// check for submit

if(isset($_POST['delete'])){

    //Get form data 
    $delete_id=mysqli_real_escape_string($conn , $_POST['delete_id']);

    $query = "DELETE FROM post WHERE id = {$delete_id}" ;

    
    if(mysqli_query($conn , $query)){

        header('Location: ' . ROOT_URL . '') ;

    }else{
        echo'ERROR' . mysqli_error($conn);
    }
}


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
 
<hr>

<form class="pull-right" method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">

<input type = 'hidden' name="delete_id" value="<?php echo $post['id']; ?>">
<input type = 'submit' name="delete" value="Delete" class='btn btn-danger'>

</form>


<a href="<?php echo ROOT_URL ; ?> editpost.php?id= <?php echo $post['id']; ?>" class= 'btn btn-default'>Edit</a>

</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<?php include('inc/footer.php'); ?>