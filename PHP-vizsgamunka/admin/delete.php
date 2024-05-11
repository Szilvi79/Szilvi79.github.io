<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once "db_conn.php";
    
    $sql = "DELETE FROM contact WHERE id = ?";
    
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("i", $param_id);
        $param_id = trim($_POST["id"]);
        if($stmt->execute()){
            header("location: home.php");
            exit();
        } else{
            echo "Oops! Hiba történt, kérjük próbálja meg újra!";
        }
    }
    $stmt->close();
    
} else{
    if(empty(trim($_GET["id"]))){
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Úrlap törlése</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Úrlap törlése</h2>
                    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php print trim($_GET["id"]); ?>"/>
                            <p>Biztos benne, hogy törölni szeretné ezt az űrlapot?</p>
                            <p>
                                <input type="submit" value="Igen" class="btn btn-danger">
                                <a href="home.php" class="btn btn-secondary">Nem</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>