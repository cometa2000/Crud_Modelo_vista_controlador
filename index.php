<!DOCTYPE html>
<html lang="en">
<head>
    <?php require './app/views/includes/metatags.php' ?>
</head>
<body> 
    <?php
        require "./app/model/crud.class.php";
        $crud = new Crud();
        if(isset($_GET["vista"])){
            switch($_GET["vista"]){
                case 'home':
                    include "./app/views/home.php";
                    break;
                case 'read':
                    $contactos = $crud->read();
                    include "./app/views/read.php";
                    break;
                case 'read2':
                    $categorias = $crud->read2();
                    include "./app/views/read2.php";
                    break;
                case 'update':
                    $contacto = $crud->show($_GET["id"]);
                    include "./app/views/update.php";
                    break;
                case 'updateCate':
                    $categoria = $crud->showCate($_GET["id"]);
                    include "./app/views/updateCate.php";
                    break;
                case 'create':
                    $categorias = $crud->read2();
                    include "./app/views/create.php";
                    break;
                case 'createCate':
                    include "./app/views/createCate.php";
                    break;
                case 'delete':
                    include "./app/views/delete.php";
                    break;
                default:
                    header("location: ./read");
                    break;
            }
        }else{
            header("location: ./home");
        }
    ?>
   

    <?php require './app/views/includes/scripts.php' ?>
</body>
</html>