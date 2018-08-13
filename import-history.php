<?php

date_default_timezone_set('Asia/Tokyo');

while (! feof(STDIN)) {
    if (preg_match('/^: ([0-9]+):([0-9]+);(.+)$/', $line = fgets(STDIN), $matches)) {
        $data = [
            'date'     => date('c', $matches[1]),
            'command'  => $matches[3],
            'status'   => $matches[2],
            'hostname' => gethostname(),
        ];
        echo implode("\t", array_map(function ($value, $key) {
            return implode(':', [ $key, $value ]);
        }, array_values($data), array_keys($data))), PHP_EOL;
    }
}
