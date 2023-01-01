<?php
//get all vars
//upload all images
//push to mysql
$target_dir = "uploads/comics";
$target_dir = "uploads/thumbnails";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

////INSERT INTO `comics` (`title`, `date`, `pages`, `thumbnail`, `series`, `_id`) VALUES ('comic 1', '2001-03-15', '[\"https://gang-fight.com/assets/comics/CactusCityOasis/1.png\"]', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToAfsPC5qBsqMS4AzAd8Dfvrlbq-gHA7Kn47_jbk4MvmGZWvhV-VkTo7xA-rp2Iq4aXYk&usqp=CAU', 'pheno', '1');
?>