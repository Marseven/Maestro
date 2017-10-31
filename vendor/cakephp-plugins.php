<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'ADmad/HybridAuth' => $baseDir . '/vendor/admad/cakephp-hybridauth/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Josegonzalez/Upload' => $baseDir . '/vendor/josegonzalez/cakephp-upload/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Search' => $baseDir . '/vendor/friendsofcake/search/',
        'cakephp3-uploadBehavior-master' => $baseDir . '/plugins/cakephp3-uploadBehavior-master/',
        'search-master' => $baseDir . '/plugins/search-master/'
    ]
];