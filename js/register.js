
document.getElementById('submit').addEventListener('click', () => {

    let input1 = document.querySelector('#in1').value.trim();

    let input2 = document.querySelector('#in2').value.trim();

    let input3 = document.querySelector('#in3').value.trim();

    let input4 = document.querySelector('#in4').value.trim();

    let error = [];

    if(input1.length == 0) {

        document.querySelector('.err1').innerHTML = "Username is empty";

        error.push("err1")

    } else {

        document.querySelector('.err1').innerHTML = "";

    }

    if(input2.length == 0) {

        document.querySelector('.err2').innerHTML = "email is empty";

        error.push("err2")

       
    }else if(input2.indexOf("@") == -1) {

        document.querySelector('.err2').innerHTML = "email must include @";

        error.push("err2")

    }else {

        document.querySelector('.err2').innerHTML = "";

    }

    if(input3.length == 0) {

        document.querySelector('.err3').innerHTML = "password is empty";

        error.push("err3")

       
    } else if(input3.length < 8) {

        document.querySelector('.err3').innerHTML = "password is not up to 8 characters";

        error.push("err3")

    } else if(input3.length != input4.length) {

        document.querySelector('.err3').innerHTML = "password do not match";

        error.push("err3")

    } else {

        document.querySelector('.err3').innerHTML = "";

    }

    if(input4.length == 0) {

        document.querySelector('.err4').innerHTML = "password again is empty";

        error.push("err4")

       
    } else {

        document.querySelector('.err4').innerHTML = ""; 
        
    }


    if(error.length == 1 || error.length == 2 || error.length == 3 || error.length == 4) {

        console.log("1");

    } else {

        const token = document.getElementById('hid').value.trim();

        $.ajax({
            url: 'process/forms.php',
            method: 'POST',
            data: {
                'username': input1,
                'email': input2,
                'password': input3,
                'token': token
            },
            success: function(data) {

                alert(data.trim());

                if(data.trim() == "err") {

                    window.location.href = "error.php";

                    document.querySelector('#in1').value = "";
                    document.querySelector('#in2').value = "";
                    document.querySelector('#in3').value = "";
                    document.querySelector('#in4').value = "";

                    
                    
                }

                if(data.trim() == "exist") {

                    document.querySelector('.exist').style.display = 'block';

                    document.querySelector('.exist').innerHTML = "User Already Exit";

                    document.querySelector('#in1').value = "";
                    document.querySelector('#in2').value = "";
                    document.querySelector('#in3').value = "";
                    document.querySelector('#in4').value = "";
                    
                }


                if(data.trim() == "yes") {

                    document.querySelector('#in1').value = "";
                    document.querySelector('#in2').value = "";
                    document.querySelector('#in3').value = "";
                    document.querySelector('#in4').value = "";

                    window.location.href = "user.php";
                    
                }


            }
        })


    }

    

});