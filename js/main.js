// JavaScript document

$(function(){

  $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" }).val();
  $( "#tabs" ).tabs();

  $("button#mobilSrch").hide();

  var logo = jQuery('#logoCln').clone();
  var content = logo.find('.logo').removeClass("logo").appendTo("#mobiLogo");
  //var mobileLogo = $("#mobiLogo").append(logo);


  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
})


/*$("body > .container-fluid").click(function(){
  if(isOpen){
    document.getElementById("mySidenav").style.width = "0";
    //document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
    isOpen = false;
  }
*/

//j
function myFunction(x) {
    x.classList.toggle("change");
}

function ajaxSearchTitle() {

  var title = $("#titleSearch").val();

  $.post("/MovieStore/model/titleSearch.php",
    {
        input: title
    },
    function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
        $("#list").html(data);
    });

}

/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "white";
}
