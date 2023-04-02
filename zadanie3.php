<?php

class RankingTable {
    private $players = [];

    public function __construct($players) {
        $this->players = $players;
    }

    public function recordResult($player, $score) {
        if (!isset($this->players[$player])) {
            $this->players[$player] = ['score' => 0, 'games' => 0];
        }
        $this->players[$player]['score'] += $score;
        $this->players[$player]['games']++;
    }

    public function playerRank($rank) {
        arsort($this->players); // Sort players by score, descending

        $prevScore = null;
        $prevGames = null;
        $prevPlayer = null;
        $currRank = 0;

        foreach ($this->players as $player => $stats) {
            $currScore = $stats['score'];
            $currGames = $stats['games'];

            if ($currScore !== $prevScore || $currGames !== $prevGames) {
                // If score or games count has changed, increment current rank
                $currRank++;
            }

            if ($currRank === $rank) {
                // Found player with requested rank
                return $player;
            }

            $prevScore = $currScore;
            $prevGames = $currGames;
            $prevPlayer = $player;
        }

        // Requested rank not found, return last player
        return $prevPlayer;
 
    }
}

$table = new RankingTable(array('Jan','Maks','Monika'));
$table->recordResult('Jan',2);
$table->recordResult('Maks',3);
$table->recordResult('Monika',5);
echo $table->playerRank(1);


