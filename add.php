<?php 
require 'config.php';


if ($_POST) {
     $title = $_POST['title'];
     $desc  =  $_POST['description'];
     $stmt  = "INSERT INTO  posts( title , descriptionname ) VALUES (:title  , :descriptionname)";
     $post =  $pdo->prepare($stmt);
     $result = $post->execute(
        array(':title' => $title ,':descriptionname' =>$desc )
     ); 
     if ($result) {
         echo"<script> alert(' new  si added'); window.location.href='index.php';</script>";
     }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h1>Post Create</h1>
            <br>
            <form action="add.php" method= "post">
                   <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title" name="title">
                   </div>
                   <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                    <div class="mb-3">   
                        <input type="submit" class="btn btn-success" id="exampleFormControlInput1" placeholder="title" value="submit">
                        <a href="index.php" class="btn btn-warning">Back</a>
                   </div>
            </form>
        </div>
    </div>
</body>
</html>