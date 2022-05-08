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
                Restriction: File type<br />
            </p>
        </div>
    </div>
</div>
<div class="container">

    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data">
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
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<p class=\"alert-success\">The file has been uploaded here: <a href=\"$target_file\">$target_file</a>.</p>";
            } else {
                echo "<p class=\"alert-danger\">Sorry, there was an error uploading your file.</p>";
            }
        }
    }
    ?>
    <script type="text/javascript" src="/static/css/bootstrap.min.js"></script>
</body>
</html>
<!--Hint: BlackList content type validation--!>
<?php
include ("../footer.php");
?>