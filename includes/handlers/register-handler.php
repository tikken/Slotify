<?php 

function sanitizeFormPassword($inputText) {
    $inputText = strip_tags($inputText);
    
    return $inputText;
};

function sanitizeFormUsername($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    
    return $inputText;
};

function sanitizeFormString($inputText) {
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));

    return $inputText;
};

if(isset($_POST['registerButton'])) {
    $username = sanitizeFormUsername($_POST['username']);
    $firstname = sanitizeFormString($_POST['firstname']);
    $lastname = sanitizeFormString($_POST['lastname']);
    $email = sanitizeFormString($_POST['email']);
    $password = sanitizeFormPassword($_POST['password']);

    $wasSuccessful = $account->register($username, $firstname, $lastname, $email, $password);
    if($wasSuccessful != true) {
        echo "Fix following errors";

    } else {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}
?>