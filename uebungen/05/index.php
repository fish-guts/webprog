<html>

<?php

function zaubern($p,$q) {
    echo "bla";
    return ($q==0) ? $p : zaubern($q,$p % $q);
}
?>

   <p> <? zaubern(2,2); ?></p> 
   
</html>