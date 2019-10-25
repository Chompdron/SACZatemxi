<?php
echo "Holis";

class miclase{
    static function imprimir($num){
        echo("<br>");
        echo($num+1);
    }
}

miclase::imprimir(2);

$cls = new miclase();
$cls->imprimir(3);

echo "http://localhost/basic/web/index.php?r=gii";
echo "http://localhost/basic/web/index.php?r=producto%2Findex";
?>