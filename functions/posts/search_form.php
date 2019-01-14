<html>
<?php
$search = "Mitgliedsname";
?>

<div id="suchform">
    <form id="search" method="get" onsubmit="return showWait();">
        <p><label for="suchbegriff">Mitglied suchen:</label>
            <input type="text" name="q" id="suchbegriff" value="<?php echo $search ?>" size="13" title=" Mitgliedsname hier eingeben " onblur="if(this.value=='')this.value='<?php echo $search ?>';" onfocus="if(this.value=='Mitgliedsname')this.value='';" />
            <input type="submit" value="suchen" />
        </p>
    </form>
</div>