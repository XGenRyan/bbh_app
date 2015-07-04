<?php
class Player
{
  public $username;
  public $kills;
  public $deaths;
  public $bountyPoints;

  public function __construct($username, $kills, $deaths, $bountyPoints) {
    $this->username     = $username;
    $this->kills        = $kills;
    $this->deaths       = $deaths;
    $this->bountyPoints = $bountyPoints;
  }

  public static function all() {
    $list = [];
    $db = Db::getInstance();
    $req = $db->query('SELECT * FROM players ORDER BY username');

    foreach($req->fetchAll() as $player) {
      $list[] = new Player($player['username'], $player['kills'], $player['deaths'], $player['bountyPoints']);
    }

    return $list;
  }

  public static function add($username, $kills, $deaths, $bountyPoints) {
    $db = Db::getInstance();
    $username = strval($username);
    $kills = intval($kills);
    $deaths = intval($deaths);
    $bountyPoints = intval($bountyPoints);
    $req = $db->prepare('INSERT IGNORE INTO players (username, kills, deaths, bountyPoints) VALUES (:username, :kills, :deaths, :bountyPoints)');
    $req->execute(array('username' => $username, 'kills' => $kills, 'deaths' => $deaths, 'bountyPoints' => $bountyPoints));

    return call('pages', 'home');
  }
}