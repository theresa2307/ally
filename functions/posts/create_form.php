<form action="./functions/posts/create_do.php" method="post" enctype="multipart/form-data">
    <span>Titel</span>
    <input type="text" maxlength="50" name="titel" placeholder="titel" />
    <span>Text</span>
    <textarea maxlength="200" name="text" placeholder="text" rows="10"></textarea>
    <input type="file" name="bild"/>
    <input type="submit" value="erstellen"/>
</form>