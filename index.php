<?php
require 'config.php';

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
     <?php 
        $stmt= $pdo -> prepare("SELECT * FROM posts ORDER BY id DESC");

        $stmt ->execute();

        $result = $stmt-> fetchAll();

     
     ?>

    <div class="card">
        <div class="card-body">
            <h1>HOME PAGE</h1>
            <br>
            <div class="cratebutton">
                <a href="add.php"  class="btn btn-primary">Create New</a>
            </div>
            <br>
            <form action="" >
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width='8%'>Id</th>
                            <th  width='15%'>Title </th>
                            <th  width='20%'>Description</th>
                            <th  width='15%'>Ceart_at</th>
                            <th  width='15%'>
                                Active
                            </th>      
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        if ($result) {
                            foreach ($result as $value) {
                                
                           ?>
                               <tr>
                                       <td><?php echo $i ?></td>
                                       <td><?php echo $value['title'] ?></td>
                                       <td><?php echo $value['descriptionname'] ?></td>
                                       <td><?php echo date('Y-m-d',strtotime($value['created_at'])) ?></td>
                                       <td>
                                           <a href="edit.php?id= <?php echo $value['id']; ?>" class="btn btn-success">Edit</a>
                                           <a href="delete.php?id= <?php echo $value['id']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                               </tr>

                           <?php  
                           $i++ ;
                            }
                        }
                        
                        ?>
                    </tbody>
                
                </table>
            
            </form>
        </div>
    </div>
</body>
</html>