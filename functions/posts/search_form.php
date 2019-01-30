<html lang="de">
    <head>
        <link rel="stylesheet" type="text/css" href="style/style_index.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $search = "Mitgliedsname";
        ?>
            <form id="search" method="get" onsubmit="return showWait();">
                <input id="suchbegriff" type="text" name="q" value="<?php echo $search ?>" style="float:left;" size="13"  title=" Mitgliedsname hier eingeben " onblur="if(this.value=='')this.value='<?php echo $search ?>';" onfocus="if(this.value=='Mitgliedsname')this.value='';" />
                <button id="suchen_button" type="submit" value="" style="float:left; margin-top:40px;"><i class="fas fa-search"></i></button>
                <!--<button id="suchen_button" class="fas fa-search" type="submit"></button>-->

            </form>
    </body>
</html>