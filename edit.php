<?php 
require 'config.php';
if ($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id   = $_POST['id'];

    $pdostatement = $pdo -> prepare ("UPDATE posts SET title = '$title' , descriptionname = '$desc'  WHERE  id = '$id' ");

    $editresult = $pdostatement -> execute();
    if ($editresult) {
        echo"<script> alert(' new  si updated'); window.location.href='index.php';</script>";
    }

    


}else{
    $pdostatement = $pdo -> prepare("SELECT * FROM posts WHERE id=".$_GET['id']);

    $pdostatement->execute();

    $result = $pdostatement -> fetchAll();

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
            <h1>Edit</h1>
            <br>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result[0]['id']?>">
                   <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title" name="title" value="<?php echo $result[0]['title']?>">
                   </div>
                   <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo $result[0]['descriptionname']?></textarea>
                    </div>
                    <div class="mb-3">   
                        <input type="submit" class="btn btn-success" id="exampleFormControlInput1" placeholder="title" value="Edit">
                        <a href="index.php" class="btn btn-warning">Back</a>
                   </div>
            </form>
        </div>
    </div>
</body>
</html>