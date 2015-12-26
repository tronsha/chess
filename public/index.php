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

$computerMove = $chess->getComputerMove();
?><html>
<head>
<?php if (isset($computerMove) && $chess->getNext() == 'b' && $computerMove != 'a1a1'): ?>
    <meta http-equiv="refresh" content="5; url='?<?php echo (isset($_GET['fen']) ? 'fen=' . $_GET['fen'] . '&amp;' : ''); ?>moves=<?php echo (isset($_GET['moves']) ? $_GET['moves'] . '|' : '') . $computerMove; ?>'">
<?php endif; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chess</title>
    <meta name="description" content="Chess">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/player.js"></script>
    <script type="text/javascript" src="js/responsive.js"></script>
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Chess</h1>
<div id="board"><?php echo $board; ?></div>
<div id="fen"><?php echo $chess->getFen(); ?></div>
</body>
</html>
