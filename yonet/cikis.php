<?php
setcookie("uyeid", "", time() - 7200);
setcookie("uyead", "", time() - 7200);
setcookie("uyemail", "", time() - 7200);

echo "<script>location.href='index.php';</script>";
?>