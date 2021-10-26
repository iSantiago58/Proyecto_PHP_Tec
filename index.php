<?php include("a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("head-tag-contents.php"); ?>
</head>

<body>
    <?php include("./includes/menu.php"); ?>

        <?php 
            if(isset($_SESSION["user"])){
                include("./includes/page/default_index.php"); 
            }else{
                include("./includes/page/login.php"); 
            }
        ?>  
</body>

<?php include("footer.php"); ?>

</html>