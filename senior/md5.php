<?php
$arrParams=[43333, 'rent'];
$strUnionedParam = '';
        if(!empty($arrParams)){
                        $strUnionedParam = md5(implode("&", $arrParams));
                                }
var_dump($strUnionedParam);

var_dump(md5(43333));
