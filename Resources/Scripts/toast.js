/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function toast(id,timeout ) {
    // Get the snackbar DIV
    var x = document.getElementById(id);

    // Add the "show" class to DIV
   // x.className = "show";
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = ""; 
     //x.classList.add("toast");
    }, timeout);
}

 