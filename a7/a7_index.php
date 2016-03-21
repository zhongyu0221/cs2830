<!DOCTYLE html>
<html>

    <head>
    <title> A7dafjkdlajf</title>
     </head>
       <style>

            h1, #anphotos {

                text-align: center;
                font-family: arial;
                color: #333;

            }

            #anphotos > img {
                height: 100px;
            }

        </style>
    <body>

    <h1>Animal Photos</h1>
            
		<div id="anphotos">
            
        <?php
        $imgs = glob("*.jpg");//put all the images to the imgs array
        foreach($imgs as $img){//pull each images 
        echo'<img src="'.$img.'" />';//'.variable.'
        }
        ?>
            
        </div>
        </body>

    
    
</html>


