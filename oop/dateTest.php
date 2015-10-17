<?php
for($i = 0; $i < 5; $i++) {
    $date = date('Ym', strtotime("-{$i} months" . date('Ym', time())));
    echo '======>', $date, PHP_EOL;
}
