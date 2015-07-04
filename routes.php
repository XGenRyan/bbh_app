<?php
function call($controller, $action) {
  require_once('controllers/'.$controller.'_controller.php');

  switch ($controller) {
    case 'pages':
      $controller = new PagesController();
      break;
    case 'players':
      require_once('models/player.php');
      require_once('helpers/players_helper.php');
      $controller = new PlayersController();
      break;
  }

  $controller->{ $action }();
}

$controllers = array('pages'   => ['home', 'error'],
                     'players' => ['index', 'create']);

if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    call($controller, $action);
  } else {
    call('pages', 'error');
  }
} else {
  call('pages', 'error');
}