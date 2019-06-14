<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */
const SCORE_OF_START = 0;
const SCORE_ONE = 1;
const SCORE_TWO = 2;
const SCORE_THREE = 3;
const SCORE_TIREBREAK = 4;
const NUMBER_PLAYER = 2;

class TennisGame
{
    public $score;

    public function getScore($player1Name, $player2Name, $scoreOfPlayer1, $scoreOfPlayer2)

    {
        if ($scoreOfPlayer1 == $scoreOfPlayer2) {
            switch ($scoreOfPlayer1) {
                case SCORE_OF_START:
                    $this->score = "Love-All";
                    break;
                case SCORE_ONE:
                    $this->score = "Fifteen-All";
                    break;
                case SCORE_TWO:
                    $this->score = "Thirty-All";
                    break;
                case SCORE_THREE:
                    $this->score = "Forty-All";
                    break;
                default:
                    $this->score = "Deuce";
                    break;

            }
        } else {
            $checkScore1 = $scoreOfPlayer1 >= SCORE_TIREBREAK;
            $checkScore2 = $scoreOfPlayer2 >= SCORE_TIREBREAK;
            if ($checkScore1 || $checkScore2) {
                $minusResult = $scoreOfPlayer1 - $scoreOfPlayer2;
                if ($minusResult == 1) $this->score = "Advantage $player1Name";
                else if ($minusResult == -1) $this->score = "Advantage $player2Name";
                else if ($minusResult >= 2) $this->score = "Win for $player1Name";
                else $this->score = "Win for $player2Name";
            } else {
                for ($i = 1; $i <= NUMBER_PLAYER; $i++) {
                    if ($i == 1) $currentScore = $scoreOfPlayer1;
                    else {
                        $this->score .= "-";
                        $currentScore = $scoreOfPlayer2;
                    }
                    $this->showScore($currentScore);
                }
            }
        }
    }

    public function __toString()
    {
        return $this->score;
    }

    /**
     * @param $currentScore
     */
    public function showScore($currentScore)
    {
        switch ($currentScore) {
            case 0:
                $this->score .= "Love";
                break;
            case 1:
                $this->score .= "Fifteen";
                break;
            case 2:
                $this->score .= "Thirty";
                break;
            case 3:
                $this->score .= "Forty";
                break;
        }
    }
}