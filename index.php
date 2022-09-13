<?php
$array = explode(PHP_EOL, file_get_contents('addresses.txt'));

$countedEmails = array_count_values($array);

uasort($countedEmails, function ($a, $b) {
    return $b - $a;
});

$line = '';
foreach ($countedEmails as $email => $count) {
    $line .= $email . " - повторяется в файле - " . $count . " раз," . PHP_EOL;
}

file_put_contents('addresses-count.txt', $line);