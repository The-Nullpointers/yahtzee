<?php
	session_start();
	if(!$_SESSION['isLoggedIn']){
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>TNP - Yhatze!</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../images/favicon.png">
</head>
<body>
  <div class="container">
    <h1>Yahtzee!</h1>

    <div class="game-section">
      <h2>Lanza los dados</h2>
      <center>
        <div class="dice-row">

          <a href="#" onclick="lockDice(1)">
            <img src="../images/dice-1.png" alt="Dice 1" width=10% height=auto id="dice-1" class="image-link"></a>

          <a href="#" onclick="lockDice(2)">
            <img src="../images/dice-2.png" alt="Dice 2" width=10% height=auto id="dice-2"></a>

            <a href="#" onclick="lockDice(3)">
            <img src="../images/dice-3.png" alt="Dice 3" width=10% height=auto id="dice-3"></a>
            
            <a href="#" onclick="lockDice(4)">
            <img src="../images/dice-4.png" alt="Dice 4" width=10% height=auto id="dice-4"></a>
            
            <a href="#" onclick="lockDice(5)">
            <img src="../images/dice-5.png" alt="Dice 5" width=10% height=auto id="dice-5"></a>
            
            <a href="#" onclick="lockDice(6)">
            <img src="../images/dice-6.png" alt="Dice 6" width=10% height=auto id="dice-6"></a>

        </div>

        <div class="lock-row white-image">


          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-1">
          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-2">
          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-3">
          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-4">
          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-5">
          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-6">

        </div>
        <br>
        <br>
        <button class="button" onclick="throwDice()">Lanzar los Dados</button>
      </center>
    </div>

    <br>
    <br>
    <br>
    <br>

    <div class="container">

    <table class="score-sheet">
      <tr>
        <th>Category</th>
        <th>Player 1</th>
        <th>Player 2</th>
      </tr>
      <tr>
        <td>Ones</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Twos</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Threes</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Fours</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Fives</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Sixes</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Three of a Kind</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Four of a Kind</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Full House</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Small Straight</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Large Straight</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Yahtzee</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Chance</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Bonus Yahtzee</td>
        <td>...</td>
        <td>...</td>
      </tr>
      <tr>
        <td>Total Score</td>
        <td>...</td>
        <td>...</td>
      </tr>
    </table>
  </div>
  </div>

  <script src="../js/game.js"></script>
</body>
</html>
