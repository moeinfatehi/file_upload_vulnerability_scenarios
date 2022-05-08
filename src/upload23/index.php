<!DOCTYPE html>
<html>
<head>
    <title>File upload</title>
    </head>
<body>
<div id="main">
    <div class="container">
        <div class="row">
            <h1>File upload</h1>
        </div>
        <div class="row">
            <p class="lead">
                Upload gif file<br />
                Restriction: File type<br />
            </p>
        </div>
    </div>
</div>
<div class="container">

    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data" onsubmit="return Validate(this);">
            <div class="form-group col-md-3">
                <input type="file" id="fileToUpload" name="fileToUpload" required>
                <input type="submit" value="Upload" class="form-control btn btn-default" name="submit">
            </div>
        </form>
    </div>

    <?php
    $target_dir = "uploads/";
    
    if(isset($_POST["submit"])) {
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $type=$_FILES["fileToUpload"]["type"];
        if (preg_match ("/(php|application|x-php|octet-stream)/i",$type)) {
            echo "<p class=\"alert-danger\">Sorry, forbidden file type</p>";
        }
        else{
            $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime-type extension
            $type_server=finfo_file($finfo, $_FILES["fileToUpload"]["tmp_name"]);
            echo $type_server;
            finfo_close($finfo);
            if (preg_match ("/(php)/i",$type_server)) { //Checks content of file server-side
                echo "<p class=\"alert-danger\">Really? :)) I told gif file, not PHP!</p>";
            }
            else{
                if (!preg_match ("/(gif)/i",$type_server)) { //Checks content of file server-side
                    echo "<p class=\"alert-danger\">Gif! Repeat after me, Gif!</p>";
                }
                else{
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "<p class=\"alert-success\">The file has been uploaded here: <a href=\"$target_file\">$target_file</a>.</p>";
                    } else {
                        echo "<p class=\"alert-danger\">Sorry, there was an error uploading your file.</p>";
                    }
                }
            }

        }
    }
    ?>
    <script type="text/javascript" src="validate.js"></script>
</body>
</html>
<!--Hint: BlackList content type validation--!>
<?php
include ("../footer.php");
?>