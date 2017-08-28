<?php
// Autoload files using Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use Nonce\WP_Nonce;


// Create new wordpress nonce 
$nonce = new WP_Nonce();