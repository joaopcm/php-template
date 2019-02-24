<?php

// Configurações
require_once "libs/autoload.php";
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

// Variáveis de ambiente
define('DBHOST', getenv('DBHOST'));
define('MYSQL_USER', getenv('MYSQL_USER'));
define('MYSQL_PASSWORD', getenv('MYSQL_PASSWORD'));
define('MYSQL_DATABASE', getenv('MYSQL_DATABASE'));
define('S3_BUCKET_NAME', getenv('S3_BUCKET_NAME'));
define('S3_BUCKET_USER', getenv('S3_BUCKET_USER'));
define('S3_BUCKET_ACCESS_KEY_ID', getenv('S3_BUCKET_ACCESS_KEY_ID'));
define('S3_BUCKET_SECRET_ACCESS_KEY', getenv('S3_BUCKET_SECRET_ACCESS_KEY'));
define('PRODUCTION_MODE', getenv('PRODUCTION_MODE'));