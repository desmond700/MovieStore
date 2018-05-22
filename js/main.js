// JavaScript document

$(function(){

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

var isOpen = false;
function toggleSideBar() {

  if(isOpen){
    document.getElementById("mySidenav").style.width = "0";
    //document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
    isOpen = false;
  }else{
    document.getElementById("mySidenav").style.width = "300px";
    //document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    isOpen = true;
  }

}
