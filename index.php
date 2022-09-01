<?php

    

    $db = 'mensagens';
    $host = 'localhost';
    $user = 'eduardo';
    $pass = '';

    try {
        
        $conn = new PDO("mysql:dbname=$db;host=localhost", $user, $pass); 

    } catch (PDOException $e) {
        echo "DEU RUIM" . $e->getMessage();
    }

    

    if(isset($_POST['nome']) && empty($_POST['nome']) == false) {

        $nome = $_POST['nome'];
        $comentario = $_POST['mensagem'];

        $stmt = $conn->prepare("INSERT INTO comentarios SET nome = :nome, msg = :msg, data_msg = NOW()");
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":msg", $comentario);
        $stmt->execute();


    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de comentários</title>

     <!-- Bootstrap -->
     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous"/> -->

</head>
<body>
    
</body>
</html>

<fieldset>

    <form action="" method="POST">

        <div>
        <label for="">Nome: </label>
        <input type="text" name="nome">
        </div><br>

        <div>
            <label for="">Mensagem: </label>
            <textarea name="mensagem"></textarea>
        </div>
        <div>
            <input type="submit" name="Enviar">
        </div>
       


    </form>

</fieldset>
<br><br>

<?php

    $stmt = "SELECT * FROM comentarios ORDER BY data_msg DESC";
    $stmt = $conn->query($stmt);

    if($stmt->rowCount() > 0) {
        foreach($stmt->fetchAll() as $mensagem):
            ?>
            <strong><?php echo $mensagem['nome']; ?></strong><br>
            <?php echo $mensagem['msg']; ?>
            <?php echo '<a href="delete.php?id='.$mensagem['id'].'">Excluir</a>' ?>
            <br>
            <hr>            
            <?php
        endforeach;
    } else {
        echo "Não mensagens";
    }
?>

   