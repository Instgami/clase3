<?php 
function crearclavealeatoria($length = 10){
return  substr(str_shuffle("0123456789abcdefghijklmnopqrstuwyzABCDEFGHIJKLMNOPQRSTUVWYZ"), 0, $length);
}
?>