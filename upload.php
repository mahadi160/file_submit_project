<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload Project</title>


</head>
<body>
    <?php
        if(isset($_FILES['file'])){
            $target_dir ="uploads/";
            $target_file = $target_dir . basename($_FILES['file']['name']);
            $upload_ok = 1;
            $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if file already exists
            if(file_exists($target_file)){
                echo "Sorry, File already exists.";
                $upload_ok = 0;
            }
            // Allow certain file formats.
            if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif" ){
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
            if($upload_ok == 0){
                echo "serry, your file was not uploaded.";
            }else{
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
                    echo "The file" . htmlspecialchars(basename($_FILES['file']['name'])). "has been uploades.";
                }else{
                    echo "Sorry, there was an error uploadimg your file.";
                }
            }
        }

    ?>

</body>
</html>

