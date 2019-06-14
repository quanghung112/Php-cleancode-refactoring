<?php
include_once 'TennisGame.php';

use PHPUnit\Framework\TestCase;
class TennisGameTest extends TestCase
{
    public function testScore(){
        $player1Name = 'player1';
        $player2Name = 'player2';
        $scoreOfPlayer1=3;
        $scoreOfPlayer2=2;

        $expected = "Forty-Thirty";
        $tennisGame=new TennisGame();
        $tennisGame->getScore($player1Name,$player2Name,$scoreOfPlayer1,$scoreOfPlayer2);
        $result=$tennisGame;
        $this->assertEquals($expected, $result);
    }
}