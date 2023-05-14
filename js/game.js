var dice1 = document.getElementById("dice-1");
var dice2 = document.getElementById("dice-2");
var dice3 = document.getElementById("dice-3");
var dice4 = document.getElementById("dice-4");
var dice5 = document.getElementById("dice-5");
var dice6 = document.getElementById("dice-6");

var lock1 = document.getElementById("lock-1");
var lock2 = document.getElementById("lock-2");
var lock3 = document.getElementById("lock-3");
var lock4 = document.getElementById("lock-4");
var lock5 = document.getElementById("lock-5");
var lock6 = document.getElementById("lock-6");

var dice1_blocked = dice2_blocked = dice3_blocked = dice4_blocked = dice5_blocked = dice6_blocked = false;
dice_lock_array = [lock1, lock2, lock3, lock4, lock5, lock6];
dice_array = [dice1, dice2, dice3, dice4, dice5, dice6];
is_dice_n_locked = [dice1_blocked, dice2_blocked, dice3_blocked, dice4_blocked, dice5_blocked, dice6_blocked];

function lockDice(dice) {

    if(is_dice_n_locked[dice-1]){
        dice_lock_array[dice-1].src = "../images/placeholder-lock.png"
        is_dice_n_locked[dice-1] = false;
    }
    else{
        dice_lock_array[dice-1].src = "../images/lock.png"
        is_dice_n_locked[dice-1] = true;
    }
}

function throwDice(){

    var n = 0;
    for(var i = 0; i < 6; i++){

        n = Math.floor(Math.random() * 6) + 1;

        if(!is_dice_n_locked[i]){
            dice_array[i].src = "../images/dice-" + n + ".png"
        }
    }
}