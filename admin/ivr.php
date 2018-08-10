<?php
if (isset($_SESSION['username'])!='admin'||isset($_SESSION['username'])!='mayor'){

echo '<a href="http://192.168.19.128/index.php?menu=voicemail" target="blank">IVR</a>';
}else{
echo  'access denied<a href="index.php">go here</a>';
}
?>