<?php
include 'header.php';

if(isset($_POST['add'])) {
    var_dump($_FILES);
        if(count($_FILES['upload']['name'])>0) {
            for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
                    if ($tmpFilePath != "") {
                        $imgFile = $_FILES['upload']['name'][$i];
                        $imgSize = $_FILES['upload']['size'][$i];
                        $uploaddir = 'upload/';
                        $uploadfile = $uploaddir . basename($_FILES['upload']['name'][$i]);
                        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
                        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
                        $userpic = "image" . rand(1000, 1000000) . "." . $imgExt;
                        if (in_array($imgExt, $valid_extensions)) {
                            if ($imgSize < 1000000) {
                                move_uploaded_file($tmpFilePath, $uploaddir . $userpic);
                            }
                        }

                    }
            }
        }
}

//        $tmpFilePath = $_FILES['upload']['tmp_name'];
//        $imgFile = $_FILES['upload']['name'];
//        $imgSize = $_FILES['upload']['size'];
//
//        $uploaddir = 'upload/';
//        $uploadfile = $uploaddir . basename($_FILES['upload']['name']);
//        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
//
//        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
//        $userpic = "image" . rand(1000, 1000000) . "." . $imgExt;
//
//        if (in_array($imgExt, $valid_extensions)) {
//            if ($imgSize < 1000000) {
//                move_uploaded_file($tmpFilePath, $uploaddir.$userpic);
//            }
//
//        }


else {


    ?>

    <html>

    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <form action="admin.php" method="post" name="add" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">nom</label>
                        <input type="text" class="form-control" name="nom" id="nom"/>
                    </div>
                    <div class="form-group">
                        <label for="upload">ajouter un fichier</label>
                        <input type="file" multiple="multiple" class="form-control" name="upload[]" id="upload"/>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php

}