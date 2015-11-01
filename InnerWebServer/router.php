<?php
if(preg_match('/\.(?:png|jpg|jpge|gif)$/', $_SERVER["REQUEST_URI"])){
    return false;
} else {
    echo "<p>Welcome to PHP</p>";
}
