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
    if ($_POST){
        $email = $_POST['email'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $streetnumber = $_POST['streetnumber'];
        $zipcode = $_POST['zipcode'];
    
        echo "<li> E-mail: ". $email. "</li>";
        echo "<li> Street: ". $street. " " .$streetnumber. "</li>";
        echo "<li> City: ". $city ."</li>";
        echo "<li> Zipcode: ". $zipcode."</li>";
    }else {
        return "";
    }

}


function validate()
{
    // TODO: This function will send a list of invalid fields back
    return [];
}

function handleForm()
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        // TODO: handle errors
    } else {
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}

require 'form-view.php';