<?php
$arrParams=[11668193, 'rent'];
$strUnionedParam = '';
        if(!empty($arrParams)){
                        $strUnionedParam = md5(implode("&", $arrParams));
                                }
var_dump($strUnionedParam);
