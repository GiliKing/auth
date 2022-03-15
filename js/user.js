
window.addEventListener('load', () => {

    let name = document.getElementById("special1").value.trim();

    let email = document.getElementById("special2").value.trim();

    let verify = document.getElementById("special3").value.trim();

    $.ajax({
        url: 'process/forms.php',
        method: 'POST',
        data: {
            'name_only': name,
            'email_only': email,
            'verify_only': verify
        },
        success: function(data) {

            if(data.trim() == "yes") {
                
                // yes verified

            }

            if(data.trim() == "no") {

                // it has not being verified
            }

        }
    })


})


document.querySelector(".link3").addEventListener('click', () => {

    let token = document.getElementById("hid").value.trim();

    $.ajax({
        url: 'logout.php',
        method: "POST",
        data: {
            'token_logout': token,
        },
        success: (data) => {

            if(data.trim() == "yes") {
                window.location.href = "index";
            }

            if(data.trim() == "no") {
                window.location.href = "error";
            }

        }
    })
})