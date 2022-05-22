<script src="https://cdn.tailwindcss.com"></script>
<link rel="shortcut icon" href="https://static.partyking.org/img/site/header/Partykungen_logo_RGB.svg" type="image/x-icon"/>
<title>Utrymmeskollaren - Partykungen</title>
<?php
require_once 'vendor/autoload.php';
require_once 'Route.php';
require_once 'controllers/ArticleController.php';

// Add base route (startpage)
Route::add('/', function () {
    include 'welcome.php';
});

// Post route example
Route::add('/', function () {
    include 'welcome.php';
}, 'post');

Route::run('/');