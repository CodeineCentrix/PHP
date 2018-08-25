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

$('document').ready(function() {

    
$('#pagination ').on('click', 'a', function(e) { // When click on a 'a' element of the pagination div
        var page = this.id; // Page number is the id of the 'a' element
	var pagination = ''; // Init pagination
      $('#articles_section').html('Loading'); // Display a processing div
	var data = {page: page, per_page: 4,action:'get_articles'}; // Create JSON which will be sent via Ajax
	
        $.ajax({ // jQuery Ajax
		type: 'POST',
		url: '../Controller/MainController.php', // URL to the PHP file which will insert new value in the database
		data: data, // We send the data string
		dataType: 'json', // Json format
		timeout: 120000,
		success: function(data) {
                   //We create the article format here now                  
              $('#articles_section').html(data.content);
                
        
        // Pagination system
			if (page == 1) pagination += '<div class="cell_disabled"><span>First</span></div><div class="cell_disabled"><span>Previous</span></div>';
			else pagination += '<div class="cell"><a  id="1">First</a></div><div class="cell"><a  id="' + (page - 1) + '">Previous</span></a></div>';
 
			for (var i=parseInt(page)-3; i<=parseInt(page)+3; i++) {
				if (i >= 1 && i <= data.numPage) {
					pagination += '<div';
					if (i == page) pagination += ' class="cell_active"><span>' + i + '</span>';
					else pagination += ' class="cell"><a id="' + i + '">' + i + '</a>';
					pagination += '</div>';
				}
			}
 
			if (page == data.numPage) pagination += '<div class="cell_disabled"><span>Next</span></div><div class="cell_disabled"><span>Last</span></div>';
			else pagination += '<div class="cell"><a id="' + (parseInt(page) + 1) + '">Next</a></div><div class="cell"><a id="' + data.numPage + '">Last</span></a></div>';
			
			$('#pagination').html(pagination); // We update the pagination DIV
		},
		error: function(error , status) {
                 window.alert("Error"+error+"Status"+status);
		}
	});
         e.preventDefault();
	return false;
       
});

$("#pagination a").trigger('click'); // When page is loaded we trigger a click


});


