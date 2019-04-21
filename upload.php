<?php 

if (isset($_POST['submit'])){
    $file = $_FILES['fichier'];
    $filename = $_FILES['fichier']['name'];
    $fileTmpName = $_FILES['fichier']['tmp_name'];
    $fileType = $_FILES['fichier']['type'];
    $fileSize = $_FILES['fichier']['size'];
    $fileError = $_FILES['fichier']['error'];
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','png','gif');
    
    if (in_array($fileActualExt, $allowed)) {
        if(count($_FILES['fichier']['name']) > 0){
            for($i=0; $i<count($_FILES['fichier']['name']); $i++) {
        if ($fileError === 0) {
            if ($fileSize <  1000000) {
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . uniqid('image', true)."." .$fileActualExt;
                move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadFile);
            } else {
                echo 'Le fichier doit être inférieur à 1 mo ';
            }
        } else {
            echo 'erreur pendant l\'upload';
        }
    }
    } else {
        echo 'Pas le bon format';
    }
    }
}


header('Location: index.php');

?>
