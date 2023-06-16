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
    
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>>
    <link rel="stylesheet" href="../css/style.css">
  </head>

</head>
<body>
  <div class="container">
    <h1>Yahtzee!</h1>
    <div class="game-section">
      <h2>Turno </h2>
      <h2 id="turno">...</h2>
        <h2>Juega: </h2>
        <h2 id="jugador">...</h2>
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

        </div>

        <div class="lock-row white-image">


          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-1">
          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-2">
          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-3">
          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-4">
          <img src="../images/placeholder-lock.png" alt="lock" class="lock-image" width=5% height=auto id="lock-5">

        </div>
        <br>
        <br>
        <button class="button" id="botonDados" onclick="throwDice(this)">Lanzar los Dados</button>
        <button class="button-winner" id="btnWinner" value="winner" name="winname" onclick="showWinnerGame()" style="display: none;">Ver Ganador</button>

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
        <th>Buttons P1</th>
        <th>Buttons P2</th>
      </tr>
      <tr>
        <td>Ones</td>
        <td id="puntosOnes1">...</td>
        <td id="puntosOnes2">...</td>
        <td> <button class="button btnPlayer1" id="botonOnes01" onclick="desactivarBoton(this, 1)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonOnes02" onclick="desactivarBoton(this, 2)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Twos</td>
        <td id="puntosTwos1">...</td>
        <td id="puntosTwos2">...</td>
        <td> <button class="button btnPlayer1" id="botonTwos01" onclick="desactivarBoton(this, 3)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonTwos02" onclick="desactivarBoton(this, 4)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Threes</td>
        <td id="puntosThrees1">...</td>
        <td id="puntosThrees2">...</td>
        <td> <button class="button btnPlayer1" id="botonThrees01" onclick="desactivarBoton(this, 5)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonThrees02" onclick="desactivarBoton(this, 6)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Fours</td>
        <td id="puntosFours1">...</td>
        <td id="puntosFours2">...</td>
        <td> <button class="button btnPlayer1" id="botonFours01" onclick="desactivarBoton(this, 7)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonFours02" onclick="desactivarBoton(this, 8)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Fives</td>
        <td id="puntosFives1">...</td>
        <td id="puntosFives2">...</td>
        <td> <button class="button btnPlayer1" id="botonFives01" onclick="desactivarBoton(this, 9)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonFives02" onclick="desactivarBoton(this, 10)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Sixes</td>
        <td id="puntosSixes1">...</td>
        <td id="puntosSixes2">...</td>
        <td> <button class="button btnPlayer1" id="botonSixes01" onclick="desactivarBoton(this, 11)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonSixes02" onclick="desactivarBoton(this, 12)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Three of a Kind</td>
        <td id="puntosTOK1">...</td>
        <td id="puntosTOK2">...</td>
        <td> <button class="button btnPlayer1" id="botonTOK01" onclick="desactivarBoton(this, 13)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonTOK02" onclick="desactivarBoton(this, 14)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Four of a Kind</td>
        <td id="puntosFourKind1">...</td>
        <td id="puntosFourKind2">...</td>
        <td> <button class="button btnPlayer1" id="botonFK01" onclick="desactivarBoton(this, 15)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonFK02" onclick="desactivarBoton(this, 16)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Full House</td>
        <td id="puntosFull1">...</td>
        <td id="puntosFull2">...</td>
        <td> <button class="button btnPlayer1" id="botonFull01" onclick="desactivarBoton(this, 17)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonFull02" onclick="desactivarBoton(this, 18)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Small Straight</td>
        <td id="puntosSmall1">...</td>
        <td id="puntosSmall2">...</td>
        <td> <button class="button btnPlayer1" id="botonSmall01" onclick="desactivarBoton(this, 19)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonSmall02" onclick="desactivarBoton(this, 20)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Large Straight</td>
        <td id="puntosLarge1">...</td>
        <td id="puntosLarge2">...</td>
        <td> <button class="button btnPlayer1" id="botonLarge01" onclick="desactivarBoton(this, 21)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonLarge02" onclick="desactivarBoton(this, 22)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Yahtzee</td>
        <td id="puntosYahtzee1">...</td>
        <td id="puntosYahtzee2">...</td>
        <td> <button class="button btnPlayer1" id="botonYat01" onclick="desactivarBoton(this, 23)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonYat02" onclick="desactivarBoton(this, 24)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Chance</td>
        <td id="puntosChance1">...</td>
        <td id="puntosChance2">...</td>
        <td> <button class="button btnPlayer1" id="botonChance01" onclick="desactivarBoton(this, 25)">Seleccionar</button> </td>
        <td> <button class="button btnPlayer2" id="botonChance02" onclick="desactivarBoton(this, 26)">Seleccionar</button> </td>
      </tr>
      <tr>
        <td>Total Score</td>
        <td id="total1">0</td>
        <td id="total2">0</td>
      </tr>
    </table>
    </div>

    <div class="container segundo-login">
      <div class="login-jugador2">

        <h2 id="jug2">Login jugador 2</h2>
            <form action="game.php" method="post">

                <input type="text" name="username" id="username" placeholder="Usuario" required>

                <input type="password" name="password"  id="password" placeholder="Contraseña" required>

                <button type="submit" name="submit" id="loginbutton" class="button-27 button-changes" value="loginj2">Login</button>
                <p id=login_error></p>

            </form>
            
            <form action="game.php" method="post">

              <button type="submit" name="submit" id="logoutbutton" class="button-logout button-changes" value="logout" style="display: none;">Desconectar Jugador 2</button>

            </form>

      </div>
    </div>
  
  
  </div>

  <?php

    if(isset($_POST['username']) && isset($_POST['password'])){

      if($_POST['submit'] == 'loginj2'){
        require_once "processes/connect.php";
        require_once "processes/loginj2.php";
      }
      
      
        
    }

    if(isset($_POST['submit'])){
      if($_POST['submit'] == 'logout'){
        require_once "processes/logoutj2.php";
      }
    }

    if(isset($_POST['winname'])){
        
      require_once "processes/connect.php";
      require_once "processes/addvictory.php";
    }
        
    ?> 
  <script src="../js/game.js"></script>
</body>


</html>
