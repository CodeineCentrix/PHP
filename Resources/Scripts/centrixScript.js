/* 
 * The purpose is to serve as a script page for the entire Web Application and will be used alongside
 * JQuery.. However this is the main Javascript file and should serve as a main file 
 * for the entire internet application. 
 *  NB don't forget to reference it in your application. 
 */

function isMainResident(){
    document.getElementById('main_resident').style.display = "block";
    }
                    
function isNormalResident(){
    document.getElementById('main_resident').style.display = "none";
    }

function ReadOrShowItem(tag){
    var myControl = document.getElementById(tag);
   
    if (myControl.style.display==="none") {
        
        myControl.style.display = "block";
    }
    else{
       myControl.style.display = "none"; 
       
    }
}

