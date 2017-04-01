<?php

header('content-type:text/html;charset=utf-8;');

require_once 'upload.class.php';
    if (isset($_POST['submit'])) {
		
      
        $up = new upload();
        $up->set_dir(dirname(__FILE__).'/uploads/','{y}/{m}');
        $up->set_thumb(100,80);
        $up->set_watermark(dirname(__FILE__).'/watermark.png',6,100);
        $fs = $up->execute();
      
        var_dump($fs);
    }
?>
<html>
<head><title>test</title></head>
<body style="margin:0;padding:0">
<form name="upload" method="post" action="index.php" enctype="multipart/form-data" style="margin:0">
   <input type="file" name="attach[]" />
   <input type="file" name="attach[]" />
   <input type="submit" name="submit" value="上 传" />
</form>
</body>
</html>