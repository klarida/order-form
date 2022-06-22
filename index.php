<?php
// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way


// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
} 

$totalValue = 0;

//your products with their price.
if(isset($_GET["food"]) && $_GET["food"] == 0){
    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];
} else {
    $products = [
        ['name' => ' Octopus', 'price' => 15],
        ['name' => ' Shrimps', 'price' => 12,3],
        ['name' => ' Salmon', 'price' => 15],
        ['name' => ' Grilled Fish', 'price' => 4],
        ['name' => ' Wild Salmon', 'price' => 20],
    ];
}

function deliveryInfo() {
  // define variables and set to empty values
$email = $street = $City = $Streetnumber = $zipcode = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $street =$_POST["street"];
  $city =$_POST["city"];
  $Streetnumber = $_POST["streetnumber"];
  $zipcode = $_POST["zipcode"];
echo $email."<br>";
echo $street."<br>";
echo $city."<br>";
echo $Streetnumber."<br>";
echo $zipcode. "<br>";

}

}

deliveryInfo();

function validate()
{

    $errors=[];
    $errorsEmail=' Email field is required, Please check if field is correctly filled in! Email has to be valid!';
    $errorStreet=' street field is required, Please check if field is correctly filled in! Can only include letters!';
    $errorsCity='city field is required, Please check if field is correctly filled in! Can only include letters!';
    $errorStreetnumber='Street number field is required, Please check if field is correctly filled in!';
    $errorszip='Zipcode field is required, Please check if field is correctly filled in! Can only include numbers!';
    $errorsproducts='You need to choose one of our products!';

    if (empty(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        array_push($errors,  $errorsEmail);
    }
    //validate street
    if (empty($_POST['street'])) {
        array_push($errors, 'Street' . $errorsStreet);
    }
    //validate streetnumber
    if (empty($_POST['streetnumber'])) {
        array_push($errors, $errorsStreetnumber);
    }

    //validate city
    if (!ctype_alpha($_POST['city'])) {
        array_push($errors, 'City ' . $errorsCity);
    }
    //validate zipcode
    if (empty($_POST['zipcode'])) {
        array_push($errors, $errorsZip);
    } else if (!ctype_digit($_POST['zipcode'])) {
        array_push($errors, $errorsZip);
    }
    //validate products
    if (empty($_POST['products'])) {
        array_push($errors, $errorsProducts);
    }
    return $errors;

    // TODO: This function will send a list of invalid fields back
   
}

function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    $warning =implode('<br>',$invalidFields);
    if (!empty($invalidFields)) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $warning;
        echo '</div>';
        // TODO: handle errors
    } else { 
        echo '<div class="alert alert-success" role="alert">';
      echo 'Your order is a succes';
      echo deliveryInfo();
      echo product($products);
      echo '</div>';
        // TODO: handle successful submission
    }
}
function product($products){
  if(!empty($_POST['products'])){
        $product = "";
        foreach($_POST['products'] as $index => $value){
            $product .="-" . $products[$index]['name'] . "<br>";
        }
        return $product;
       
    }

}
 

echo product($products);
// TODO: replace this if by an actual check
$formSubmitted = false;
if(isset($_POST['submit'])){
    $formSubmitted =true;
}
if ($formSubmitted) {
    handleForm();
}

require 'form-view.php';