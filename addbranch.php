<?php

session_start();

if(isset($_SESSION['ID']) && isset($_SESSION['PWD']))
   {
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>

    <script src="js/main.js"></script>
    <title>Add Branch</title>
</head>

<body>

    <div class="container-fluid bg-black">
        <div class="row" id="loader">
            <div class="col-5">
            </div>
            <div class="col-2">
                <div id="loadingBox">
                    <div id="loaderText">C.R.M.S.</div>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary" id="hidenav">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="welcome.php">Crime Record Management System</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link bg-dark ms-2 rounded-pill" aria-current="page" href="welcome.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bg-dark ms-2 rounded-pill" href="assigned.php">Assigned cases</a>
                                </li>
                                <li class="nav-item active dropdown">
                                    <a class="nav-link dropdown-toggle bg-dark ms-2 rounded-pill" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Add options
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="addcriminal.php">Add Criminal</a></li>
                            <li><a class="dropdown-item" href="addofficers.php">Add Officer</a></li>
                            <li><a class="dropdown-item" href="addcitizen.php">Add Citizen</a></li>
                            <li><a class="dropdown-item" href="addvictim.php">Add Victim</a></li>
                            <li><a class="dropdown-item active" href="addbranch.php">Add Branch</a></li>
                            <li><a class="dropdown-item" href="addcase.php">Add Case</a></li>
                        </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle bg-dark ms-2 rounded-pill" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Display options
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="criminal.php">Criminal List</a></li>
                                        <li><a class="dropdown-item" href="officers.php">Officer List</a></li>
                                        <li><a class="dropdown-item" href="citizen.php">Citizen List</a></li>
                                        <li><a class="dropdown-item" href="victim.php">Victim List</a></li>
                                        <li><a class="dropdown-item" href="branch.php">Branch List</a></li>
                                        <li><a class="dropdown-item" href="case.php">Case List</a></li>
                                        <li><a class="dropdown-item" href="profile.php">Edit profile</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bg-dark ms-2 rounded-pill" href="logout.php">Log Out</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>

    <div class="container-fluid bg-black">

        <div class="row text-white" id="welcomeBody">
            <div class="ml-5 text-center text-white">
                <h1>Enter Branch Details</h1>
            </div>

            <?php

$servername = "localhost";
$username = "paisashu_crms";
$password = "Dhoni@3655#";
$dbname = "paisashu_crms";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
    header('Location: index.php');
}
else
{  
                $sql3 = "SELECT CaseID FROM crime ORDER BY CaseID DESC LIMIT 1";
                
                $result3 = $conn->query($sql3);

                if( mysqli_num_rows($result3) > 0)
                {
                
                    ?>

            <div class="col-12 text-white text-center">
                <div class="row">
                    <div class="col-12 p2">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="editProfile">
                            <div class="col-auto">
                                Branch ID <br>
                            </div>
                            <input type="text" name="branchID" class="form-control criminalDetails" required>

                            <div class="col-auto">
                                Manager <br>
                            </div>
                                <select name="manager" class="form-control criminalDetails" required>
                                    <option value="none" selected disabled>Choose one</option>
                                    <?php
                            $sql9 = "SELECT * FROM officer";
                            $result9 = $conn->query($sql9);
                            
                            if($result9->num_rows > 0)
                            while($row9 = $result9->fetch_assoc())
                            {
                                ?>

                                    <option value="<?php echo $row9["OfficerID"]; ?>"><?php echo $row9["OfficerID"]; ?>
                                    </option>

                                    <?php
                            }
                                ?>
                                </select>

                            <div class="col-auto">
                                Address <br>
                            </div>
                            <textarea name="address" class="form-control criminalDetails"
                                    style="width:30vw;height:20vh;"
                                    placeholder="Enter Branch Address in maximum 5 lines." required></textarea>
                            <div class="col-auto">
                                Details <br>
                            </div>
                            <textarea name="details" class="form-control criminalDetails"
                                    style="width:30vw;height:20vh;"
                                    placeholder="Enter Branch Major Functionalities in maximum 5 lines."
                                    required></textarea>
                            <div class="col-auto">
                            </div>
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>

            <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                        $sql = "INSERT INTO `branch`(`BranchID`, `Manager`, `Address`, `Details`) VALUES ('".$_REQUEST["branchID"]."', '".$_REQUEST["manager"]."','".$_REQUEST["address"]."', '".$_REQUEST["details"]."')";
                        $result = $conn->query($sql);

                        if($result)
                        {
                            ?>

            <div class="col-12 m-5 text-white text-center">
                <div class="row">
                    <div class="col-12">
                        <span class="alert alert-success" role="alert">Branch Added Successfully!</span>
                    </div>
                </div>
            </div>

            <?php
            unset($_SESSION["adhaar"]);
                        }
                        else
                        {
                            ?>

            <div class="col-12 m-5 text-white text-center">
                <div class="row">
                    <div class="col-12">
                        <span class="alert alert-warning" role="alert">Could not add case!</span>
                    </div>
                </div>
            </div>

            <?php
                        }
                    }
                    
                    }
                        }

        ?>

        </div>
    </div>
</body>

</html>
<?php
   
    }
    else
    {
        header('Location: index.html');
        exit;
    }
?>