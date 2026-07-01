<?php 
session_start();


if(!isset($_SESSION['user_id'])){
    header('Location: ../includes/erreur403.php');
    exit();
}elseif($_SESSION['user_role'] !== "admin"){
    header('Location: ../includes/erreur403.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Bonjour Monsieur l'<?php echo $_SESSION['user_role']; ?> </h1>
    
</body>
</html>
        
</body>
</html>