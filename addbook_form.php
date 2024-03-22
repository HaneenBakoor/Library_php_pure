<center>
<form action="add_book.php" method="post" enctype="multipart/form-data">
<label for="title">Title:</label>
<input type="text" id="title" name="title" required>
<br>
<br>
<label for="auther">Auther:</label>
<input id="auther" name="auther" required>
<br>
<br>
<label for="subject">Subject:</label>
<textarea id="subject" name="subject"></textarea>
<br>
<br>
<label for="gner">Gner:</label>
<input type="text"  name="gner">
<br>
<br>
<label for="pdate">Published Date:</label>
<input type="date"  name="pdate">
<br>
<br>
<label for="file">File:</label>
<input type="file" id="file" name="file">
<br>
<br>
<input type="submit" name="add">
</form>
</center>