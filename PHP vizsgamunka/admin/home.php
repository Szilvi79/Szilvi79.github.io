<?php 
session_start();

require_once "db_conn.php"; 

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    require_once "db_conn.php";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin oldal</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <header style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                        <img src="../img/e-forditas.logo.png" alt="Sly e-fordítás" style="width: 100px; height: auto;">
                        <div style="flex-grow: 1; text-align: center;">
                            <h1 style="margin: 0;">Hello, <?php print $_SESSION['name']; ?>!</h1>
                        </div>
                        <button style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;"><a href="logout.php" style="text-decoration: none; color: #fff;">Kilépés</a></button>
                    </header>
                </div>
            </div>
        </div>
    </div>

    <div style="display: flex; justify-content: center;">
        <section>
            <button id="kapcsolatButton"><a href="#1">Kapcsolatfelvételi űrlap</a></button>
            <button id="arajanlatButton"><a href="#2">Árajánlatkérés űrlap</a></button>
            <button id="blogButton"><a href="#2">Szolgáltatások ára</a></button>
        </section>
    </div>

    <div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 id="1" class="pull-left">Kapcsolatfelvételi űrlapok</h2>
                    </div>

                    <?php
                    require_once "db_conn.php";
                    
                    $sql = "SELECT * FROM contact";
                    if($result = $conn->query($sql)){
                        if($result->num_rows > 0){
                            print '<table class="table table-bordered table-striped">';
                                print "<thead>";
                                    print "<tr>";
                                        print "<th>ID</th>";
                                        print "<th>Név</th>";
                                        print "<th>E-mail cím</th>";
                                        print "<th>Művelet</th>";
                                    print "</tr>";
                                print "</thead>";
                                print "<tbody>";
                                while($row = $result->fetch_assoc()){
                                    print "<tr>";
                                        print "<td>" . $row['id'] . "</td>";
                                        print "<td>" . $row['name'] . "</td>";
                                        print "<td>" . $row['email'] . "</td>";
                                        print "<td>";
                                            print '<a href="read_contact.php?id='. $row['id'] .'" class="mr-3" title="Űrlap megtekintése" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            print '<a href="delete.php?id='. $row['id'] .'" title="Úrlap törlése" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        print "</td>";
                                    print "</tr>";
                                }
                                print "</tbody>";                            
                            print "</table>";
                        
                            mysqli_free_result($result);
                        } else{
                            print '<div class="alert alert-danger"><em>Jelenleg egy beküldött űrlap sincs.</em></div>';
                        }
                    } else{
                        print "Oops! Hiba történt, kérjük próbálja meg újra!";
                    }                
                    ?>

                </div>
            </div>        
        </div>
    </div>
</div>

<div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 id="2" class="pull-left">Árajánlatkérés űrlapok</h2>
                    </div>

                    <?php
                    require_once "db_conn.php";
                    
                    $sql = "SELECT * FROM arajanlat";
                    if($result = $conn->query($sql)){
                        if($result->num_rows > 0){
                            print '<table class="table table-bordered table-striped">';
                                print "<thead>";
                                    print "<tr>";
                                        print "<th>ID</th>";
                                        print "<th>Név</th>";
                                        print "<th>Telefonszám</th>";
                                        print "<th>E-mail cím</th>";
                                        print "<th>Művelet</th>";
                                    print "</tr>";
                                print "</thead>";
                                print "<tbody>";
                                while($row = $result->fetch_assoc()){
                                    print "<tr>";
                                        print "<td>" . $row['id'] . "</td>";
                                        print "<td>" . $row['name'] . "</td>";
                                        print "<td>" . $row['phone'] . "</td>";
                                        print "<td>" . $row['email'] . "</td>";
                                        print "<td>";
                                            print '<a href="read_arajanlat.php?id='. $row['id'] .'" class="mr-3" title="Űrlap megtekintése" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            print '<a href="delete.php?id='. $row['id'] .'" title="Úrlap törlése" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        print "</td>";
                                    print "</tr>";
                                }
                                print "</tbody>";                            
                            print "</table>";
                        
                            mysqli_free_result($result);
                        } else{
                            print '<div class="alert alert-danger"><em>Jelenleg egy beküldött űrlap sincs.</em></div>';
                        }
                    } else{
                        print "Oops! Hiba történt, kérjük próbálja meg újra!";
                    }
 
                    ?>

                </div>
            </div>        
        </div>
    </div>
</div>

<div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 id="3" class="pull-left">Szolgáltatások ára</h2>
                    </div>

                    <?php
                    require_once "db_conn.php";
                    
                    $sql = "SELECT * FROM arak";
                    if($result = $conn->query($sql)){
                        if($result->num_rows > 0){
                            print '<table class="table table-bordered table-striped">';
                                print "<thead>";
                                    print "<tr>";
                                        print "<th>Bizonyítvány</th>";
                                        print "<th>Nyomtatvány</th>";
                                        print "<th>Idegenről</th>";
                                        print "<th>Magyarról</th>";
                                        print "<th>Lektorálás</th>";
                                        print "<th>Felár 2 nap</th>";
                                        print "<th>Felár 1 nap</th>";
                                        print "<th>Művelet</th>";
                                    print "</tr>";
                                print "</thead>";
                                print "<tbody>";
                                while($row = $result->fetch_assoc()){
                                    print "<tr>";
                                        print "<td>" . $row['bizonyitvany'] . "</td>";
                                        print "<td>" . $row['nyomtatvany'] . "</td>";
                                        print "<td>" . $row['idegenrol'] . "</td>";
                                        print "<td>" . $row['magyarrol'] . "</td>";
                                        print "<td>" . $row['lektoralas'] . "</td>";
                                        print "<td>" . $row['felarKetto'] . "</td>";
                                        print "<td>" . $row['felarEgy'] . "</td>";
                                        print "<td>";
                                        print '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Módosítás" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>'; print "</td>";
                                    print "</tr>";
                                }
                                print "</tbody>";                            
                            print "</table>";
                        
                            mysqli_free_result($result);
                        } else{
                            print '<div class="alert alert-danger"><em>Jelenleg nincsenek árak.</em></div>';
                        }
                    } else{
                        print "Oops! Hiba történt, kérjük próbálja meg újra!";
                    }
 
                    mysqli_close($conn);
                    ?>

                </div>
            </div>        
        </div>
    </div>
</div>

<div>
    <a href="home.php"><img src="../img/top.png" alt="Fel"></a>
</div>

</body>
</html>
