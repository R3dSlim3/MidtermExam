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
$Price = $Quantity = $Name = $Price2 = $Quantity2 = $Name2 ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = Data($_POST["Product_Name"]);
    $Price = Data($_POST["Product_Price"]);
    $Quantity = Data($_POST["Product_Quantity"]);
    $Name2 = Data($_POST["Product_Name2"]);
    $Price2 = Data($_POST["Product_Price2"]);
    $Quantity2 = Data($_POST["Product_Quantity2"]);
}

function Data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
        return $data;
}
?>
<?php 

if($Name != "" && $Price != "" && $Quantity != ""
    && $Name2 != "" && $Price2 != "" && $Quantity2 != ""){                                
include './Database_Connection/Database_Connect.php';
mysqli_query($con,"INSERT INTO simple_pos (Product_Name,Product_Quantity,Product_Price)
    VALUES ('$Name','$Quantity','$Price')");
mysqli_query($con,"INSERT INTO simple_pos (Product_Name,Product_Quantity,Product_Price)
    VALUES ('$Name2','$Quantity2','$Price2')");
mysqli_close($con);
        



}
?>

<!-- TEST CODE -->

<body>    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
        
<!-- Form Starts here -->

    <!-- Content here -->   
    <div class="card d-flex justify-content-center ">
        <!--Navigation Bar -->
        <h3 class="card-title ">
            <ul class="nav justify-content-center ">
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
    
        <h1 class="card-title text-center">INSERT POS</h1>
            <div class="BodyContainer1"> 
                <div class="card-body">
    <!-- Card Body 2 -->
    <div class="row text-center">
        <div class="col">
            <div class="card" style="margin: auto;">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Name of the Product</h6>
                        <div class="form-group d-grid gap-3">
                            <input type="text" class="form-control text-center" name="Product_Name" id="formGroupExampleInput" placeholder="Product Name">
                            <input type="text" class="form-control text-center" name="Product_Name2" id="formGroupExampleInput" placeholder="Product Name">
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
                            <input type="text" class="form-control text-center" name="Product_Price2" id="formGroupExampleInput2" placeholder="Price Market">
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
                            <input type="text" class="form-control text-center" name="Product_Quantity2" id="formGroupExampleInput2" placeholder="Quantity">
                        </div>
                </div>
            </div>
        </div>
    </div>
<!-- Start of Total Card Here -->
        <div class="CardContainer container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total:</h5>
                        <!--PHP CODE STARTS HERE -->
                        <h5 class="card-title" style="margin: auto;">
                            <?php
                                if($Name != "" && $Price != "" && $Quantity != ""
                                    && $Name2 != "" && $Price2 != "" && $Quantity2 != ""){
                                    $Product1 = $Price * $Quantity;
                                    $Product2 = $Price2 * $Quantity2;
                                    $Total = $Product1 + $Product2;
                                        echo "Products: 
                                        <br>$Name - $Product1
                                        <br>$Name2 - $Product2
                                        <br>";   
                                        echo "Total: $Total";
                                }else if($Name == "" || $Price == "" || $Quantity == ""
                                        || $Name2 == "" || $Price2 == "" || $Quantity2 == ""){
                                        echo "Please Provide Information!!!";
                                }
                            ?>
                        </h5>
                        <!--PHP CODE STOPS HERE -->
                </div>
            </div>
            <div class="ButtonContainer">
                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
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