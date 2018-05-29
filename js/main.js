// JavaScript document

$(function(){

  $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" }).val();


  $("button#mobilSrch").hide();

  var logo = jQuery('#logoCln').clone();
  var content = logo.find('.logo').removeClass("logo").appendTo("#mobiLogo");
  //var mobileLogo = $("#mobiLogo").append(logo);


  $( '.dropdown-menu button.dropdown-toggle' ).on( 'click', function ( e ) {
        var $el = $( this );
        var $parent = $( this ).offsetParent( ".dropdown-menu" );
        if ( !$( this ).next().hasClass( 'show' ) ) {
            $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
        }
        var $subMenu = $( this ).next( ".dropdown-menu" );
        $subMenu.toggleClass( 'show' );

        $( this ).parent( "div" ).toggleClass( 'show' );

        $( this ).parents( 'div.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
            $( '.dropdown-menu .show' ).removeClass( "show" );
        } );

         if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
            $el.next().css( { "top": $el[0].offsetBottom, "right": $parent.outerWidth() - $parent.width() } );
        }

        return false;
  } );

  var scntDiv = $('#directorInput');
        var i = $('#directorInput p').size() + 1;

        $('#addScnt').live('click', function() {
                $('<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt_' + i +'" value="" placeholder="Input Value" /></label> <a href="#" id="remScnt">Remove</a></p>').appendTo(scntDiv);
                i++;
                return false;
        });

        $('#remScnt').live('click', function() {
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
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
