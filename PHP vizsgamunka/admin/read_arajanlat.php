<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "db_conn.php";

    $sql = "SELECT * FROM arajanlat WHERE id = ?";
    
    if($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $param_id);
        $param_id = trim($_GET["id"]);
        
        if($stmt->execute()) {
            $result = $stmt->get_result();
    
            if($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
             
                $name = $row["name"];
                $phone = $row["phone"];
                $email = $row["email"];
                $language1= $row["language1"];
                $language2= $row["language2"];
                $szolgaltatas = $row["szolgaltatas"];
                $hatarido = $row["hatarido"];
                $kuldes = $row["kuldes"];
                $fileToUpload = $row["fileToUpload"];
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
                            <label>Telefonszám:</label>
                            <p><b><?php print $row["phone"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>E-mail cím:</label>
                            <p><b><?php print $row["email"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Forrásnyelv:</label>
                            <p><b><?php print $row["language1"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Célnyelv:</label>
                            <p><b><?php print $row["language2"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Szolgáltatás:</label>
                            <p>(1 = Fordítás, 2 = Tolmácsolás, 3 = Lektorálás)</p>
                            <p><b><?php print $row["szolgaltatas"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Határidő:</label>
                            <p>(1 = Normál, 3 munkanap, 2 = sűrgős, 2 munkanap (50% felár), 3 = Sűrgős, 1 munkanap (100% felár))</p>
                            <p><b><?php print $row["hatarido"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Küldés:</label>
                            <p>(1 = Sima forditás e-mailben küldve, 2 = Sima fordítás postán küldve, 3 = Záradékolt fordítás postán küldve)</p>
                            <p><b><?php print $row["kuldes"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Fájl:</label>
                            <p><b><?php print $row["fileToUpload"]; ?></b></p>
                        </div>
                        <div class="form-group">
                            <label>Üzenet:</label>
                            <p><b><?php print $row["message"]; ?></b></p>
                        </div>
                        <p><a href="home.php" class="btn btn-primary">Vissza</a></p>
                    </div>
                </div>        
            </div>
        </div>

</body>
</html>
