$(document).ready(function() {

    $(".logoutbtn").on("click", function(e) {
        e.preventDefault(); 


        $.ajax({
            type: "POST",
            url: "logout.php",
            success: function(response) {

                window.location.href = "login.php";
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});


