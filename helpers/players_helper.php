<?php
function isValidPlayer($player) {
  $GLOBALS['xml'] = simplexml_load_file('http://api.xgenstudios.com/?method=xgen.boxhead.users.stats&username='.$player);
  return ($GLOBALS['xml'][0]['stat'] == "ok" ? true : false);
}

function getKills() {
  return $GLOBALS['xml'][0]->user->kills;
}

function getDeaths() {
  return $GLOBALS['xml'][0]->user->deaths;
}

function getBountyPoints() {
  return $GLOBALS['xml'][0]->user->bountyPoints;
}