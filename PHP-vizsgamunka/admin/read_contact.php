<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "db_conn.php";

    $sql = "SELECT * FROM contact WHERE id = ?";
    
    if($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $param_id);
        $param_id = trim($_GET["id"]);
        
        if($stmt->execute()) {
            $result = $stmt->get_result();
    
            if($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
             
                $name = $row["name"];
                $email = $row["email"];
                $message = $row["message"];
            } else{
                header("location: error.php");
                exit();
            }
            
        } else{
            print "Oops! Hiba történt, kérjük próbálja meg újra!";
        }
    }
 
    mysqli_stmt_close($stmt);
    
} else{
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Űrlap megtekintése</title>
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
                    <h1 class="mt-5 mb-3">Űrlap megtekintése</h1>
                    <div class="form-group">
                        <label>Név</label>
                        <p><b><?php print $row["name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>E-mail cím</label>
                        <p><b><?php print $row["email"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Üzenet</label>
                        <p><b><?php print $row["message"]; ?></b></p>
                    </div>
                    <p><a href="home.php" class="btn btn-primary">Vissza</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

