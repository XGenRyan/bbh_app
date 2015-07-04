<?php
class PlayersController
{
  public function index() {
    $players = Player::all();
    require_once('views/players/index.php');
  }

  public function create() {
    if (!isset($_POST['username']) || !isValidPlayer($_POST['username'])) return call('pages', 'error');
    $player = Player::add($_POST['username'], getKills(), getDeaths(), getBountyPoints());
  }
}