
// window.addEventListener('load', () => {

//     let name = document.getElementById("special1").value.trim();

//     let email = document.getElementById("special2").value.trim();

//     let verify = document.getElementById("special3").value.trim();

//     $.ajax({
//         url: 'process/forms.php',
//         method: 'POST',
//         data: {
//             'name_only': name,
//             'email_only': email,
//             'verify_only': verify
//         },
//         success: function(data) {

//             alert(data.trim());

//             if(data.trim() == "yes") {

//                 window.location.href = "user.php";

//             }

//             if(data.trim() == "no") {

//                 alert("remain on change not equla to 1");
//             }

//         }
//     })


// })