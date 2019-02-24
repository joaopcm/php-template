<?php

use \Template\Model\PageAdmin;

$app->get('/', function () {
    $page = new PageAdmin();
    $page->setTpl('index');
});