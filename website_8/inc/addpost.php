<?php

require('db.php');
require('config.php');

// check for submit

if(isset($_POST['submit'])){

    //Get form data 
    $title=mysqli_real_escape_string($conn , $_POST['title']);
    $body=mysqli_real_escape_string($conn , $_POST['body']);
    $author=mysqli_real_escape_string($conn , $_POST['author']);

    $query = "INSER INTO posts(title , author, body) VALUES('$title','$author','$body')" ;

    if(mysqli_query($conn , $query)){

        header('Location: ' . ROOT_URL . '') ;

    }else{
        echo'ERROR' . mysqli_error($conn);
    }
}

?>

<?php include('inc/header.php'); ?>
    
<div class="container">


<h1>Add Post</h1>

<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?> ">

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class='form-control'>
    </div>

    <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" class='form-control'>
    </div>

    <div class="form-group">
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>

    <input type="submit" name="sumbit" value="submit" class="btn btn-primary">

</form>


</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php include('inc/footer.php'); ?>