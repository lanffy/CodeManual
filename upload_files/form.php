<b>php upload file test</b> 
<hr />

<b>upload from</b>
<form enctype="mulitpart/form-data" action="do_upload_file.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
    <input type="file" name="upload_file_name" />
    <input type="submit" value="do upload file" />
</form>
