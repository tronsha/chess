<?php

require_once('../vendor/autoload.php');

use Chess\Chess;

$chess = new Chess;
if (isset($_GET['fen']) === true) {
    $chess->setFen($_GET['fen']);
}
if (isset($_GET['moves']) === true) {
    $chess->setMoves($_GET['moves']);
}
$board = $chess->getBoardHtml();

?><html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chess</title>
    <meta name="description" content="Chess">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery.js"></script>
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Chess</h1>
<div id="board"><?php echo $board; ?></div>
</body>
</html>
