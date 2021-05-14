<!DOCTYPE HTML>  
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./Styles/Style.css">

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    
</head>
<!-- Start Here!!! -->
<body>    
<!-- Form Starts here -->

    <div class="container-md" style="margin-top: 5rem;">
    <!-- Content here -->   
        <div class="card d-flex justify-content-center">
        <!--Navigation Bar -->
        <h3 class="card-title">
            <ul class="nav justify-content-center">
                <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="./Insert.php">INSERT</a>
                </li>
                <li class="nav-item">                        
    <a class="nav-link" href="./Display.php">READ</a>
                </li>
                <li class="nav-item">                        
    <a class="nav-link" href="./Update.php">UPDATE</a>
                </li>
                <li class="nav-item">                        
    <a class="nav-link" href="./Delete.php">DELETE</a>
                </li>
            </ul>
        </h3>            
        <!--Navigation Stop -->
<!-- Star Coding Here DISPLAY UPDATE ============================================================================-->
    <h3 class="card-title text-center">DISPLAY DATABASE:</h3>
        <!-- Button trigger modal -->
<div class="ButtonContainer">        
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal1">
        Show DataBase
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DATABASE:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <!-- Start Coding Here -->
<?php
include './Database_Connection/Database_Connect.php';

$sql = "SELECT * FROM `simple_pos` WHERE 1";

$result = $con->query($sql);

echo "<div class='container'>";
echo "<table class='table table-striped table-bordered table-hover '>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Product_Name</th>";
echo "<th>Product_Quantity</th>";
echo "<th>Product_Price</th>";

echo "</tr>";

while($row = $result->fetch_assoc())
{
echo "<tr>";
echo "<td>".$row['ID']."</td>";
echo "<td>".$row['Product_Name']."</td>";
echo "<td>".$row['Product_Quantity']."</td>";
echo "<td>".$row['Product_Price']."</td>";
echo "</tr>";
}
echo "</table>";
echo "</div>";
$con->close();
?>               
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Card Body Stops Here -->
        </div>
    </div>
<!-- Content Stops here -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>



</html>