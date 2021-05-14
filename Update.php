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

<!-- TEST CODE -->
<?php
// define variables and set to empty values
$Price = $Quantity = $Name= $ID ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = Data($_POST["Product_Name"]);
    $Price = Data($_POST["Product_Price"]);
    $Quantity = Data($_POST["Product_Quantity"]);
    $ID = Data($_POST["Product_ID"]);
}

function Data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
        return $data;
}
?>

<?php 
include './Database_Connection/Database_Connect.php';

if($Name != "" && $Price != "" && $Quantity != ""){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
mysqli_query($con,"UPDATE simple_pos SET `Product_Name` = '$Name', `Product_Quantity` = '$Quantity', `Product_Price`='$Price'
WHERE `simple_pos`.`ID` = $ID;");
mysqli_close($con);
}
//NAME ONLY
}else if($Name != "" && $Price == "" && $Quantity == ""){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
mysqli_query($con,"UPDATE simple_pos SET `Product_Name` = '$Name'
WHERE `simple_pos`.`ID` = $ID;");
mysqli_close($con);
}
//PRICE ONLY
}else if($Name == "" && $Price != "" && $Quantity == ""){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
mysqli_query($con,"UPDATE simple_pos SET `Product_Price` = '$Price'
WHERE `simple_pos`.`ID` = $ID;");
mysqli_close($con);
}//QUANTITY ONLY
}else if($Name == "" && $Price == "" && $Quantity != ""){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
mysqli_query($con,"UPDATE simple_pos SET `Product_Quantity` = '$Quantity'
WHERE `simple_pos`.`ID` = $ID;");
mysqli_close($con);
}
}
?>

<!-- TEST CODE -->

<body>    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
        
<!-- Form Starts here -->

    <!-- Content here -->   
    <div class="card d-flex justify-content-center ">
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
<div class="BodyCardContainer container-fluid">
        <h1 class="card-title text-center">UPDATE POS</h1>
        <div class="card text-center" style="margin: auto;">
                <div class="card-body">
                    <h5 class="card-title" >Product ID:</h5>
                    <div   div class="form-group d-grid gap-3">
                            <input type="text" class="form-control text-center" name="Product_ID" id="formGroupExampleInput" placeholder="Product Name">
                    </div>
                </div>
        </div>
<div class="BodyContainer1 "> 
        <div class="card-body ">
    <!-- Card Body 2 -->
    <div class="row text-center ">
        <div class="col">
            <div class="card" style="margin: auto;">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Name of the Product</h6>
                        <div class="form-group d-grid gap-3">
                            <input type="text" class="form-control text-center" name="Product_Name" id="formGroupExampleInput" placeholder="Product Name">
                        </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="margin: auto;">
                <div class="card-body">
                    <h5 class="card-title">Price</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Price of The Products: </h6>
                        <div class="form-group d-grid gap-3">
                            <input type="text" class="form-control text-center" name="Product_Price" id="formGroupExampleInput2" placeholder="Price Market">
                        </div>
                    </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="margin: auto;">
                <div class="card-body">
                    <h5 class="card-title">Quantity</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Quantity of the Product</h6>
                        <div class="form-group d-grid gap-3">
                            <input type="text" class="form-control text-center" name="Product_Quantity" id="formGroupExampleInput2" placeholder="Quantity">
                        </div>
                </div>
            </div>
        </div>
    </div>
<!-- Start of Total Card Here -->
        <div class="CardContainer container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Show Changes</h5>
                        <!--PHP CODE STARTS HERE -->
                                <!-- DATABASE TABLE MODAL HERE!!! -->
<!-- Button trigger modal -->

<button type="button" class="btn btn-primary" style="margin: auto;" data-bs-toggle="modal" data-bs-target="#exampleModal">
  >CLICK<
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- CODE STARTS HERE -->
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




                        <!--PHP CODE STOPS HERE -->
                </div>
            </div>
            <div class="ButtonContainer container-fluid">
                <input class="btn btn-primary" type="submit" name="update" value="Update">
            </div>
        </div>
        
<!-- Stops of Total Card Here -->  
<!-- Card Body 2 Stops Here -->
<!-- Card Body Stops Here -->
                </div>
            </div>
</div> 

<!-- Content Stops here -->
</div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>

</html>