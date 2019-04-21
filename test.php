<?php
if(isset($_POST['submit'])){
    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = "uploads/" . date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'][$i];
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {
                    $files[] = $shortname;
                    //insert into db 
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file

                }
              }
        }
    }
}
?>

<form action="" enctype="multipart/form-data" method="post">
    <div>
        <label for='upload'>Add Attachments:</label>
        <input id='upload' name="upload[]" type="file" multiple="multiple" />
    </div>
    <p><input type="submit" name="submit" value="Submit"></p>
</form>
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
        if(count($_FILES['upload']['name']) > 0){
            for($i=0; $i<count($_FILES['upload']['name']); $i++) {
        if ($fileError === 0) {
            if ($fileSize <  1000000) {
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . uniqid('image', true)."." .$fileActualExt;
                move_uploaded_file($_FILES['fichier']['tmp_name'][$i], $uploadFile);
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

?>

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
    } else {
        echo 'Pas le bon format';
    }
}

header('Location: index.php');

?>