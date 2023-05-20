var dice1 = document.getElementById("dice-1");
var dice2 = document.getElementById("dice-2");
var dice3 = document.getElementById("dice-3");
var dice4 = document.getElementById("dice-4");
var dice5 = document.getElementById("dice-5");

var lock1 = document.getElementById("lock-1");
var lock2 = document.getElementById("lock-2");
var lock3 = document.getElementById("lock-3");
var lock4 = document.getElementById("lock-4");
var lock5 = document.getElementById("lock-5");

/*Variables de puntajes*/
var a=0;
var b=0; 
var c=0; 
var d=0;
var e=0;

var dice1_blocked = dice2_blocked = dice3_blocked = dice4_blocked = dice5_blocked = false;
dice_lock_array = [lock1, lock2, lock3, lock4, lock5];
dice_array = [dice1, dice2, dice3, dice4, dice5];
is_dice_n_locked = [dice1_blocked, dice2_blocked, dice3_blocked, dice4_blocked, dice5_blocked];

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


//variables
var contadorturnos=1; 
var contadorlanzamiento=0;

var total1=0;
var total2=0;

function throwDice(boton){

    var n = 0;
    for(var i = 0; i < 5; i++){

        n = Math.floor(Math.random() * 6) + 1;

        if(!is_dice_n_locked[i]){
            dice_array[i].src = "../images/dice-" + n + ".png"

            if(i==0){
                a=0;
                a=n;
            }else if(i==1){
                b=0;
                b=n;
            }else if(i==2){
                c=0;
                c=n;
            }else if(i==3){
                d=0;
                d=n;
            }else if(i==4){
                e=0;
                e=n;
            }
        }
    }
    
    obtenerPuntos();

    obtenerTotal();

    contadorlanzamiento+=1;
    if(contadorlanzamiento==3){
        desactivarBotonDados();
    }
    if(contadorturnos==27){
        if(total1>total2){
            //Jugador 1 ganador
            Swal.fire({
                title: 'Fin del juego',
                text: 'El jugador 1 es el ganador',
                icon: 'success',
                confirmButtonText: 'OK',
            });
        }
        if(total2>total1){
            //jugador 2 ganador
            Swal.fire({
                title: 'Fin del juego',
                text: 'El jugador 2 es el ganador',
                icon: 'success',
                confirmButtonText: 'OK',
            });
        }
        if(total1==total2){
            //empate
            Swal.fire({
                title: 'Fin del juego',
                text: 'Es un empate',
                icon: 'warning',
                confirmButtonText: 'OK',
            });
        }
            /*// Realizar una solicitud AJAX a tu script PHP para comparar los números e insertar el resultado en la base de datos
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                // Aquí puedes realizar alguna acción adicional después de guardar el resultado en la base de datos
                console.log('Resultado guardado en la base de datos');
              }
            };
            xhttp.open("POST", "addvictory.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("total1=" + total1 + "&total2=" + total2);*/
    }

    if(contadorturnos % 2 == 0){
        document.getElementById("jugador").innerHTML = "Jugador 2";
        
    }else{
        document.getElementById("jugador").innerHTML = "Jugador 1";
        turno=0;
        turno=(contadorturnos/2)+0.5;
        document.getElementById("turno").innerHTML = turno;
    }

}


function desactivarBotonDados() {
    var boton = document.getElementById("botonDados");
    boton.disabled = true;
    boton.classList.add('disabled');
}

function activarBotonDados(){
    var boton = document.getElementById("botonDados");
    boton.disabled = false;
    boton.classList.remove('disabled');
}


var puntajeOnes1 = false;
var puntajeOnes2 = false;

var puntajeTwos1 = false;
var puntajeTwos2 = false;

var puntajeThrees1 = false;
var puntajeThrees2 = false;

var puntajeFours1 = false;
var puntajeFours2 = false;

var puntajeFives1 = false;
var puntajeFives2 = false;

var puntajeSixes1 = false;
var puntajeSixes2 = false;

var puntajeTOK1 = false;
var puntajeTOK2 = false;

var puntajeFK1 = false;
var puntajeFK2 = false;

var puntajeFull1 = false;
var puntajeFull2 = false;

var puntajeSmall1 = false;
var puntajeSmall2 = false;

var puntajeLarge1 = false;
var puntajeLarge2 = false;

var puntajeYat1 = false;
var puntajeYat2 = false;

var puntajeChance1 = false;
var puntajeChance2 = false;

//Variables de total
    var pOne1=0;
    var pOne2=0;

    var pTwo1=0;
    var pTwo2=0;
    
    var pThree1=0;
    var pThree2=0;
    
    var pFour1=0;
    var pFour2=0;
    
    var pFive1=0;
    var pFive2=0;
    
    var pSix1=0;
    var pSix2=0;
    
    var pToK1=0;
    var pToK2=0;
    
    var pFK1=0;
    var pFK2=0;
    
    var pFull1=0;
    var pFull2=0;
    
    var pSmall1=0;
    var pSmall2=0;
    
    var pLarge1=0;
    var pLarge2=0;
    
    var pYat1=0;
    var pYat2=0;
    
    var pCha1=0;
    var pCha2=0;
//Variables de total

function obtenerPuntos(){

    var suma=0;
    var valores = [];
    var ordenados = [];
    for(var i=0; i<5; i++){
        n=0;
        if(i==0){
            valores.push(a);
        }else if(i==1){
            valores.push(b);
        }else if(i==2){
            valores.push(c);
        }else if(i==3){
            valores.push(d);
        }else if(i==4){
            valores.push(e);
        }

        suma = a+b+c+d+e;
    }
   
    ordenados=bubbleSort(valores); //vital, ordena los valores del vector para facilitar eliminar repetidos
    unicos=norepetidos(ordenados); //vital, elimina los numeros repetidos para facilitar metodos straight


    //Funciones de la tabla de puntajes
    var ones=0;
    var twos=0;
    var threes=0;
    var fours=0;
    var fives=0;
    var sixes=0;
    for (var i=0; i<valores.length; i++){
        if(valores[i]==1){ //Ones
            ones+=valores[i];
        }
        if(valores[i]==2){ //Twos
            twos+=valores[i];
        }
        if(valores[i]==3){ //Threes
            threes+=valores[i];
        }
        if(valores[i]==4){ //Fours
            fours+=valores[i];
        }
        if(valores[i]==5){ //Fives
            fives+=valores[i];
        }
        if(valores[i]==6){ //Sixes
            sixes+=valores[i];
        }
    }

    //Three of a kind
    var tok=ThreeOfKind(valores);

    //Four of a kind
    var fourkind=FourOfKind(valores);

    //Full house
    var fullhouse=full(valores);

    //Small straight 
    var small=0;
    for (var i = 0; i <unicos.length - 2; i++) { 
        if (unicos[i] === unicos[i+1] - 1 && unicos[i+1] === unicos[i+2] - 1) {
          small=30;
        }
    }

    //Large straight
    var large=0;
    for (var i = 0; i < unicos.length - 3; i++) { 
        if (unicos[i] === unicos[i+1] - 1 && unicos[i+1] === unicos[i+2] - 1 && unicos[i+2] === unicos[i+3] - 1) {
          large=40;
        }
    }

    //Yahtzee!
    var yahtzee=0;
    if(valores[0]==valores[1] && valores[0]==valores[2] && valores[0]==valores[3] && valores[0]==valores[4]){  
        yahtzee=50;
    }

    //Chance
    var chance=0;
    chance = valores[0] + valores[1] + valores[2] + valores[3] + valores[4]; 



    //Texto de td
    if(contadorturnos%2 == 0){
        if(!puntajeOnes2){
            var puntosOnes = document.getElementById("puntosOnes2");
            puntosOnes.textContent = ones;
        }
        if(!puntajeTwos2){
            var puntosTwos = document.getElementById("puntosTwos2");
            puntosTwos.textContent = twos;            
        }
        if(!puntajeThrees2){
            var puntosThrees = document.getElementById("puntosThrees2");
            puntosThrees.textContent = threes;
        }
        if(!puntajeFours2){
            var puntosFours = document.getElementById("puntosFours2");
            puntosFours.textContent = fours; 
        }
        if(!puntajeFives2){
            var puntosFives = document.getElementById("puntosFives2");
            puntosFives.textContent = fives;   
        }
        if(!puntajeSixes2){
            var puntosSixes = document.getElementById("puntosSixes2");
            puntosSixes.textContent = sixes;   
        }
        if(!puntajeTOK2){
            var puntosTOK = document.getElementById("puntosTOK2");
            puntosTOK.textContent = tok;   
        }
        if(!puntajeFK2){
            var puntosFourKind = document.getElementById("puntosFourKind2");
            puntosFourKind.textContent = fourkind;   
        }
        if(!puntajeFull2){
            var puntosFull = document.getElementById("puntosFull2");
            puntosFull.textContent = fullhouse;   
        }
        if(!puntajeSmall2){
            var puntosSmall = document.getElementById("puntosSmall2");
            puntosSmall.textContent = small;   
        }
        if(!puntajeLarge2){
            var puntosLarge = document.getElementById("puntosLarge2");
            puntosLarge.textContent = large;  
        }
        if(!puntajeYat2){
            var puntosYahtzee = document.getElementById("puntosYahtzee2");
            puntosYahtzee.textContent = yahtzee;   
        }
        if(!puntajeChance2){
            var puntosChance = document.getElementById("puntosChance2");
            puntosChance.textContent = chance;
        }
    }
    else{
        if(!puntajeOnes1){ //si no ha sido seleccionado
            var puntosOnes = document.getElementById("puntosOnes1");
            puntosOnes.textContent = ones;   
        }
        if(!puntajeTwos1){
            var puntosTwos = document.getElementById("puntosTwos1");
            puntosTwos.textContent = twos;  
        }
        if(!puntajeThrees1){
            var puntosThrees = document.getElementById("puntosThrees1");
            puntosThrees.textContent = threes;    
        }
        if(!puntajeFours1){
            var puntosFours = document.getElementById("puntosFours1");
            puntosFours.textContent = fours;
        }
        if(!puntajeFives1){
            var puntosFives = document.getElementById("puntosFives1");
            puntosFives.textContent = fives;   
        }
        if(!puntajeSixes1){
            var puntosSixes = document.getElementById("puntosSixes1");
            puntosSixes.textContent = sixes; 
        }
        if(!puntajeTOK1){
            var puntosTOK = document.getElementById("puntosTOK1");
            puntosTOK.textContent = tok; 
        }
        if(!puntajeFK1){
            var puntosFourKind = document.getElementById("puntosFourKind1");
            puntosFourKind.textContent = fourkind;
        }
        if(!puntajeFull1){
            var puntosFull = document.getElementById("puntosFull1");
            puntosFull.textContent = fullhouse; 
        }
        if(!puntajeSmall1){
           var puntosSmall = document.getElementById("puntosSmall1");
            puntosSmall.textContent = small;
        }
        if(!puntajeLarge1){
            var puntosLarge = document.getElementById("puntosLarge1");
            puntosLarge.textContent = large; 
        }
        if(!puntajeYat1){
            var puntosYahtzee = document.getElementById("puntosYahtzee1");
            puntosYahtzee.textContent = yahtzee;
        }
        if(!puntajeChance1){
           var puntosChance = document.getElementById("puntosChance1");
            puntosChance.textContent = chance;
        }
    }  
} 


function bubbleSort(arr) {
    var n = arr.length;
    for (var i = 0; i < n - 1; i++) {
      for (var j = 0; j < n - i - 1; j++) {
        if (arr[j] > arr[j + 1]) {
          var temp = arr[j];
          arr[j] = arr[j + 1];
          arr[j + 1] = temp;
        }
      }
    }
    return arr;
}
  
function norepetidos(arr) {
    var numerosUnicos = [...new Set(arr)];

  return numerosUnicos;
}

function ThreeOfKind(vector) {
    var numerosVistos = {};
    var trio=false;
    suma=0;
    for (var i = 0; i < vector.length; i++) {
        var numero = vector[i];
        if (numerosVistos[numero]) {
            numerosVistos[numero]++;
            if (numerosVistos[numero] === 3) {
                trio = true; // Se encontraron tres números repetidos
            }
        } else {
            numerosVistos[numero] = 1;
        }
    }
    if(trio==true){
        for(var i=0; i<vector.length; i++){
            suma+=vector[i];
        }
    }
    return suma;
}

function FourOfKind(vector) {
    var numerosVistos = {};
    var cuarteto=false;
    suma=0;
    for (var i = 0; i < vector.length; i++) {
        var numero = vector[i];
        if (numerosVistos[numero]) {
            numerosVistos[numero]++;
            if (numerosVistos[numero] === 4) {
                cuarteto = true; // Se encontraron cuatro números repetidos
            }
        } else {
            numerosVistos[numero] = 1;
        }
    }
    if(cuarteto==true){
        for(var i=0; i<vector.length; i++){
            suma+=vector[i];
        }
    }
    return suma;

}

function full(array){
    var conteo = {};
    var puntos=0;
  
    // Contar la frecuencia de cada número
    for (var i = 0; i < array.length; i++) {
        var numero = array[i];
        if (conteo[numero]) {
            conteo[numero]++;
        } else {
            conteo[numero] = 1;
        }
    }

    var valores = Object.values(conteo);

    // Verificar si hay un trío y una pareja
    if (valores.includes(3) && valores.includes(2)) {
        puntos=25; // Hay un Full House
    }

    return puntos;
}



function desactivarBoton(boton, n){
    boton.disabled=true;
    boton.setAttribute('style', 'background-color: gray; color: white;');

    switch (n){
        case 1:
            puntajeOnes1=true;
            break;
        case 2:
            puntajeOnes2=true;
            break;
        case 3:
            puntajeTwos1=true;
            break;
        case 4:
            puntajeTwos2=true;
            break;
        case 5:
            puntajeThrees1=true;
            break;
        case 6:
            puntajeThrees2=true;
            break;
        case 7:
            puntajeFours1=true;
            break;
        case 8:
            puntajeFours2=true;
            break;
        case 9:
            puntajeFives1=true;
            break;
        case 10:
            puntajeFives2=true;
            break;
        case 11:
            puntajeSixes1=true;
            break;
        case 12:
            puntajeSixes2=true;
            break;
        case 13:
            puntajeTOK1=true;
            break;
        case 14:
            puntajeTOK2=true;
            break;
        case 15:
            puntajeFK1=true;
            break;
        case 16:
            puntajeFK2=true;
            break;
        case 17:
            puntajeFull1=true;
            break;
        case 18:
            puntajeFull2=true;
            break;
        case 19:
            puntajeSmall1=true;
            break;
        case 20:
            puntajeSmall2=true;
            break;
        case 21:
            puntajeLarge1=true;
            break;
        case 22:
            puntajeLarge2=true;
            break;
        case 23:
            puntajeYat1=true;
            break;
        case 24:
            puntajeYat2=true;
            break;
        case 25:
            puntajeChance1=true;
            break;
        case 26:
            puntajeChance2=true;
            break;
    }
    activarBotonDados();
    obtenerTotal();

    contadorlanzamiento=0;
    contadorturnos+=1;

}


function obtenerTotal(){
    //Obtener los valores para el total


        if(puntajeOnes2){ //para enviar valores a total
            var pOn2 = document.getElementById("puntosOnes2");
            pOne2 = parseInt(pOn2.innerHTML);
        }
        if(puntajeTwos2){
            var pTw2=document.getElementById("puntosTwos2");
            pTwo2 = parseInt(pTw2.innerHTML);
        }
        if(puntajeThrees2){
            var pTh2=document.getElementById("puntosThrees2");
            pThree2 = parseInt(pTh2.innerHTML);
        }
        if(puntajeFours2){
            var pFo2=document.getElementById("puntosFours2");
            pFour2 = parseInt(pFo2.innerHTML);
        }
        if(puntajeFives2){
            var pFi2=document.getElementById("puntosFives2");
            pFive2 = parseInt(pFi2.innerHTML);
        }
        if(puntajeSixes2){
            var pSi2=document.getElementById("puntosSixes2");
            pSix2 = parseInt(pSi2.innerHTML);  
        }
        if(puntajeTOK2){
            var pTk2=document.getElementById("puntosTOK2");
            pToK2 = parseInt(pTk2.innerHTML);
        }
        if(puntajeFK2){
            var pFk2=document.getElementById("puntosFourKind2");
            pFK2 = parseInt(pFk2.innerHTML);
        }
        if(puntajeFull2){
            var pFu2=document.getElementById("puntosFull2");
            pFull2 = parseInt(pFu2.innerHTML);
        }
        if(puntajeSmall2){
            var pSma2=document.getElementById("puntosSmall2");
            pSmall2 = parseInt(pSma2.innerHTML);
        }
        if(puntajeLarge2){
            var pLar2=document.getElementById("puntosLarge2");
            pLarge2 = parseInt(pLar2.innerHTML);
        }
        if(puntajeYat2){
            var pY2=document.getElementById("puntosYahtzee2");
            pYat2 = parseInt(pY2.innerHTML);
        }
        if(puntajeChance2){
            var pCh2=document.getElementById("puntosChance2");
            pCha2 = parseInt(pCh2.innerHTML);
        }
        if(puntajeOnes1){
           var pOn1 = document.getElementById("puntosOnes1");
            pOne1 = parseInt(pOn1.innerHTML); 
        }
        if(puntajeTwos1){
            var pTw1=document.getElementById("puntosTwos1");
            pTwo1 = parseInt(pTw1.innerHTML);
        }
        if(puntajeThrees1){
            var pTh1=document.getElementById("puntosThrees1");
            pThree1 = parseInt(pTh1.innerHTML);  
        }
        if(puntajeFours1){
            var pFo1=document.getElementById("puntosFours1");
            pFour1 = parseInt(pFo1.innerHTML); 
        }
        if(puntajeFives1){
            var pFi1=document.getElementById("puntosFives1");
            pFive1 = parseInt(pFi1.innerHTML);
        }
        if(puntajeSixes1){
            var pSi1=document.getElementById("puntosSixes1");
            pSix1 = parseInt(pSi1.innerHTML);
        }
        if(puntajeTOK1){
            var pTk1=document.getElementById("puntosTOK1");
            pToK1 = parseInt(pTk1.innerHTML);
        }
        if(puntajeFK1){
            var pFk1=document.getElementById("puntosFourKind1");
            pFK1 = parseInt(pFk1.innerHTML);
        }
        if(puntajeFull1){
            var pFu1=document.getElementById("puntosFull1");
            pFull1 = parseInt(pFu1.innerHTML);
        }
        if(puntajeSmall1){
            var pSma1=document.getElementById("puntosSmall1");
            pSmall1 = parseInt(pSma1.innerHTML);
        }
        if(puntajeLarge1){
            var pLar1=document.getElementById("puntosLarge1");
            pLarge1 = parseInt(pLar1.innerHTML);
        }
        if(puntajeYat1){
            var pY1=document.getElementById("puntosYahtzee1");
            pYat1 = parseInt(pY1.innerHTML);
        }
        if(puntajeChance1){
            var pCh1=document.getElementById("puntosChance1");
            pCha1 = parseInt(pCh1.innerHTML);
        }

    //Total score
    total1=0;
    total2=0;
    total1 = pOne1 + pTwo1 + pThree1 + pFour1 + pFive1 + pSix1 + pToK1 + pFK1 + pFull1 + pSmall1 + pLarge1 + pYat1 + pCha1;
    total2 = pOne2 + pTwo2 + pThree2 + pFour2 + pFive2 + pSix2 + pToK2 + pFK2 + pFull2 + pSmall2 + pLarge2 + pYat2 + pCha2;

    //Imprimir total 1
    var tot1 = document.getElementById("total1");
    tot1.textContent = total1;

    //Imprimir total 2
    var tot2 = document.getElementById("total2");
    tot2.textContent = total2;

}