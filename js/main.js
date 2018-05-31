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

  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    //alert(recipient);
    if(recipient === "login"){
      // Customer login
      var cusavatar = $("<i class='fa fa-user-circle text-success'></i>");
      var cusimgdiv = $("<div class='imgcontainer my-0' style='font-size:110px'></div>").append(cusavatar);
      var cusnamelabel = $("<label class='d-flex align-items-center' for='uname'><b>Username: </b></label>")
      var cusnameinput = $("<input class='form-control form-control-sm py-0' type='text' placeholder='Enter Username' style='line-height:6px' name='uname' required />")
      var cusformgroup1 = $("<div class='d-flex form-group'></div>").append(cusnamelabel,cusnameinput);
      var cuspasslabel = $("<label class='d-flex align-items-center' for='psw'><b>Password: </b></label>")
      var cuspassinput = $("<input class='form-control form-control-sm py-0' type='password' placeholder='Enter Password' name='uname' required />")
      var cusformgroup2 = $("<div class='d-flex form-group'></div>").append(cuspasslabel,cuspassinput);
      var cusloginbtn = $("<button type='submit'>Login</button>");
      var cusrempassinput = $("<input type='checkbox' checked='checked' name='remember'> <span>Remember me</span>");
      var cusrempassspan = $("<span class='psw pt-4'>Forgot <a href='#'>password?</a></span>");
      var cuslabel = $("<label class='pt-4'></label>").append(cusrempassinput);
      var cusflexdiv = $("<div class='d-flex justify-content-between'></div>").append(cuslabel,cusrempassspan);
      var cuscontdiv = $("<div class='container'></div>").append(cusformgroup1,cusformgroup2,cusloginbtn,cusflexdiv);
      var cusform = $("<form class='modal-content animate my-auto' action='/MovieStore/model/logindb?type=cust'></form>").append(cusimgdiv,cuscontdiv);
      modal.find('#tabs-1').append(cusform);
      // Admin login
      var adminavatar = $("<i class='fa fa-user-circle text-success'></i>");
      var adminimgdiv = $("<div class='imgcontainer my-0' style='font-size:110px'></div>").append(adminavatar);
      var adminnamelabel = $("<label class='d-flex align-items-center' for='uname'><b>Username: </b></label>")
      var adminnameinput = $("<input class='form-control form-control-sm py-0' type='text' placeholder='Enter Username' style='line-height:6px' name='uname' required />")
      var adminformgroup1 = $("<div class='d-flex form-group'></div>").append(adminnamelabel,adminnameinput);
      var adminpasslabel = $("<label class='d-flex align-items-center' for='psw'><b>Password: </b></label>")
      var adminpassinput = $("<input class='form-control form-control-sm py-0' type='password' placeholder='Enter Password' name='uname' required />")
      var adminformgroup2 = $("<div class='d-flex form-group'></div>").append(adminpasslabel,adminpassinput);
      var adminloginbtn = $("<button type='submit'>Login</button>");
      var adminrempassinput = $("<input type='checkbox' checked='checked' name='remember'> <span>Remember me</span>");
      var adminrempassspan = $("<span class='psw pt-4'>Forgot <a href='#'>password?</a></span>");
      var adminlabel = $("<label class='pt-4'></label>").append(adminrempassinput);
      var adminflexdiv = $("<div class='d-flex justify-content-between'></div>").append(adminlabel,adminrempassspan);
      var admincontdiv = $("<div class='container'></div>").append(adminformgroup1,adminformgroup2,adminloginbtn,adminflexdiv);
      var adminform = $("<form class='modal-content animate my-auto' action='/MovieStore/model/logindb?type=admin'></form>").append(adminimgdiv,admincontdiv);
      modal.find('#tabs-2').append(adminform);

    }else if(recipient === "signup"){
      var avatar = $("<i class='fa fa-user-circle text-success'></i>");
      var imgdiv = $("<div class='imgcontainer my-0' style='font-size:110px'></div>").append(avatar);
      var namelabel = $("<label class='d-flex align-items-center' for='uname' style='width:30%'><b>Username: </b></label>")
      var nameinput = $("<input class='form-control form-control-sm py-0' type='text' placeholder='Enter Username' style='line-height:6px' name='uname' required />")
      var formgroup1 = $("<div class='d-flex form-group'></div>").append(namelabel,nameinput);
      var emaillabel = $("<label class='d-flex align-items-center' for='uname' style='width:30%'><b>Email: </b></label>")
      var emailinput = $("<input class='form-control form-control-sm py-0' type='email' placeholder='Enter Email' style='line-height:6px' name='email' required />")
      var formgroup2 = $("<div class='d-flex form-group'></div>").append(emaillabel,emailinput);
      var passlabel = $("<label class='d-flex align-items-center' for='psw' style='width:30%'><b>Password: </b></label>")
      var passinput = $("<input class='form-control form-control-sm py-0' type='password' placeholder='Enter Password' name='passw' required />")
      var formgroup3 = $("<div class='d-flex form-group'></div>").append(passlabel,passinput);
      var confpasslabel = $("<label class='d-flex align-items-center' for='psw' style='width:30%'><b>Confirm Password: </b></label>")
      var confpassinput = $("<input class='form-control form-control-sm py-0' type='password' placeholder='Confirm Password' name='cpassw' required />")
      var formgroup4 = $("<div class='d-flex form-group'></div>").append(confpasslabel,confpassinput);
      var signupbtn = $("<button type='submit'>Signup</button>");
      var contdiv = $("<div class='container'></div>").append(formgroup1,formgroup2,formgroup3,formgroup4,signupbtn);
      var form = $("<form class='modal-content animate my-auto' action='/action_page.php'></form>").append(imgdiv,contdiv);
      var tab2 = $("#tabs-1").append(form);

      var li1 = $("<li><a href='#tabs-1'>Login</a></li>");
      var li2 = $('<li><a href="#tabs-2">SignUp</a></li>');
      var tabs = $('<div id="tabs"></div>').append(li1,li2);
      modal.find('.modal-body').html(form);
    }
  })
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
