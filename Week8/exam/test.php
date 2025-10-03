<?php
echo hash('ripemd128', 'saltstringmypassword');
echo password_hash("ripemd128", PASSWORD_DEFAULT)
?>