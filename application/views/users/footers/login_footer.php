<script>
    
    $('body').bind('copy paste cut drag drop', function (e) {
  e.preventDefault();
});
var message = "This function is not allowed here";

function rtclickcheck(keyp) {
    if (navigator.appName == "Netscape" && keyp.which == 3) {
       alert(message);
        return false;
    }
    if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) {
       alert(message);
        return false;
    }
}

// code for preventing from back

history.pushState(null, null, window.location.href);

history.back();

window.onpopstate = () => history.forward();


// code for preventing from refresh

function disableF5(e) { if ((e.which || e.keyCode) == 116 ) e.preventDefault(); };


$(document).ready(function(){

$(document).on("keydown", disableF5);

});
</script>
</body>

</html>