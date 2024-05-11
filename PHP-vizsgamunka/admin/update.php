<?php
require_once "db_conn.php";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $bizonyitvany = $nyomtatvany = $idegenrol = $magyarrol = $lektoralas = $felarKetto = $felarEgy = "";
    $bizonyitvany_err = $nyomtatvany_err = $idegenrol_err = $magyarrol_err = $lektoralas_err = $felarKetto_err = $felarEgy_err = "";
    
    if(empty(trim($_POST["bizonyitvany"]))){
        $bizonyitvany_err = "Adjon meg egy árat!";
    } else{
        $bizonyitvany = trim($_POST["bizonyitvany"]);
    }
   
    if(empty(trim($_POST["nyomtatvany"]))){
        $nyomtatvany_err = "Adjon meg egy árat!";     
    } else{
        $nyomtatvany = trim($_POST["nyomtatvany"]);
    }
    
    if(empty(trim($_POST["idegenrol"]))){
        $idegenrol_err = "Adjon meg egy árat!";     
    } else{
        $idegenrol = trim($_POST["idegenrol"]);
    }
 
    if(empty(trim($_POST["magyarrol"]))){
        $magyarrol_err = "Adjon meg egy árat!";     
    } else{
        $magyarrol = trim($_POST["magyarrol"]);
    }
 
    if(empty(trim($_POST["lektoralas"]))){
        $lektoralas_err = "Adjon meg egy árat!";     
    } else{
        $lektoralas = trim($_POST["lektoralas"]);
    }
    
    if(empty(trim($_POST["felarKetto"]))){
        $felarKetto_err = "Adjon meg egy árat!";     
    } else{
        $felarKetto = trim($_POST["felarKetto"]);
    }
    
    if(empty(trim($_POST["felarEgy"]))){
        $felarEgy_err = "Adjon meg egy árat!";     
    } else{
        $felarEgy = trim($_POST["felarEgy"]);
    }
  
    if(empty($bizonyitvany_err) && empty($nyomtatvany_err) && empty($idegenrol_err) && empty($magyarrol_err) && empty($lektoralas_err) && empty($felarKetto_err) && empty($felarEgy_err)){
   
        $sql = "UPDATE arak SET bizonyitvany=?, nyomtatvany=?, idegenrol=?, magyarrol=?, lektoralas=?, felarKetto=?, felarEgy=? WHERE id=?";
        
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("sssssssi", $param_bizonyitvany, $param_nyomtatvany, $param_idegenrol, $param_magyarrol, $param_lektoralas, $param_felarKetto, $param_felarEgy, $param_id);
           
            $param_bizonyitvany = $bizonyitvany;
            $param_nyomtatvany = $nyomtatvany;
            $param_idegenrol = $idegenrol;
            $param_magyarrol = $magyarrol;
            $param_lektoralas = $lektoralas;
            $param_felarKetto = $felarKetto;
            $param_felarEgy = $felarEgy;
            $param_id = $_POST["id"];
            
            if($stmt->execute()){
                header("location: home.php");
                exit();
            } else{
                print "Oops! Hiba történt, kérjük próbálja meg újra!";
            }
        }
        
        $stmt->close();
    }
    $conn->close();

} else{

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  
        $id =  trim($_GET["id"]);
        
        $sql = "SELECT * FROM arak WHERE id = ?";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("i", $param_id);
         
            $param_id = $id;
            
            if($stmt->execute()){
                $result = $stmt->get_result();
    
                if($result->num_rows == 1){
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                  
                    $bizonyitvany = $row["bizonyitvany"];
                    $nyomtatvany = $row["nyomtatvany"];
                    $idegenrol = $row["idegenrol"];
                    $magyarrol = $row["magyarrol"];
                    $lektoralas = $row["lektoralas"];
                    $felarKetto = $row["felarKetto"];
                    $felarEgy = $row["felarEgy"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                print "Oops! Hiba történt, kérjük próbálja meg újra!";
            }
        }
       
        $stmt->close();
        
        $conn->close();

    }  else{
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Árak módosítása</title>
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
                    <h2 class="mt-5">Árak módosítása</h2>
                    <p>Itt tudja módosítani a szolgáltatások árait.</p>
                    <form action="<?php print htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Bizonyítvány</label>
                            <input type="text" name="bizonyitvany" class="form-control <?php print (!empty($bizonyitvany_err)) ? 'is-invalid' : ''; ?>" value="<?php print $bizonyitvany; ?>">
                            <span class="invalid-feedback"><?php print $bizonyitvany_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Nyomtatvany</label>
                            <input type="text" name="nyomtatvany" class="form-control <?php print (!empty($nyomtatvany_err)) ? 'is-invalid' : ''; ?>" value="<?php print $nyomtatvany; ?>">
                            <span class="invalid-feedback"><?php print $nyomtatvany_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Idegenről</label>
                            <input type="text" name="idegenrol" class="form-control <?php print (!empty($idegenrol_err)) ? 'is-invalid' : ''; ?>" value="<?php print $idegenrol; ?>">
                            <span class="invalid-feedback"><?php print $idegenrol_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Magyarról</label>
                            <input type="text" name="magyarrol" class="form-control <?php print (!empty($magyarrol_err)) ? 'is-invalid' : ''; ?>" value="<?php print $magyarrol; ?>">
                            <span class="invalid-feedback"><?php print $magyarrol_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Lektorálás</label>
                            <input type="text" name="lektoralas" class="form-control <?php print (!empty($lektoralas_err)) ? 'is-invalid' : ''; ?>" value="<?php print $lektoralas; ?>">
                            <span class="invalid-feedback"><?php print $lektoralas_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Felár 2 napos</label>
                            <input type="text" name="felarKetto" class="form-control <?php print (!empty($felarKetto_err)) ? 'is-invalid' : ''; ?>" value="<?php print $felarKetto; ?>">
                            <span class="invalid-feedback"><?php print $felarKetto_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Felár 1 napos</label>
                            <input type="text" name="felarEgy" class="form-control <?php print (!empty($felarEgy_err)) ? 'is-invalid' : ''; ?>" value="<?php print $felarEgy; ?>">
                            <span class="invalid-feedback"><?php print $felarEgy_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php print $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Mentés">
                        <a href="home.php" class="btn btn-secondary ml-2">Vissza</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>