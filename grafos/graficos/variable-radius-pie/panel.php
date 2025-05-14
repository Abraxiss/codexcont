<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="../../css/home.css">
    </head>
    <body>

<div class="container-all">
    <input type="radio" id="1" name="image-slide" hildden />
    <input type="radio" id="2" name="image-slide" hildden />
    <input type="radio" id="3" name="image-slide" hildden />
        <div class="slide">
            <div class="item-slide">
                <?php include('activo.php'); ?> 
            </div>
            <div class="item-slide">
                <?php include('paspat.php'); ?> 
            </div>
            <div class="item-slide">
                <img src="img/3.png">
            </div>      
        </div>
    <div class="pagination">
        <label class="pagination-item" for="1">
            <img src="img/1.png">
        </label>
        <label class="pagination-item" for="2">
            <img src="img/2.png">
        </label>
        <label class="pagination-item" for="3">
            <img src="img/3.png">
        </label>
    </div>  
</div>



       

    </body>
</html>
