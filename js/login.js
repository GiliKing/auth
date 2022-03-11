// if the page loads check if remember me in cookie is set
window.addEventListener('load', function() {

    let user = document.cookie;

    let decodedCookie =  decodeURIComponent(user)

    console.log(user);

    console.log(user.indexOf('auth'));

    let check2 = user.substring(0, user.indexOf(";"));

    let check3 = check2.substring(check2.indexOf('auth=') + 5);

    if(check3 != "") {

        let check4 = JSON.parse(check3);

        if(check4.key.trim() != "") {

            $.ajax({
                url: 'process/forms.php',
                method: 'POST',
                data: {
                    'remember_user': check4.key.trim()
                },
                success: function(data) {

                    if(data.trim() == "yes") {

                        
                        document.querySelector('#in2').value = "";
                        document.querySelector('#in3').value = "";

                        window.location.href = "user";
                        
                    }

                }
            })

        }
    }



})

// checking the checkbox at the first instance
let checkonly = [];

checkonly.push("no");

let checkbox = document.querySelector("input[name=remember]");

checkbox.addEventListener('change', () => {

    if(checkbox.checked) {

        const index = checkonly.indexOf("no");

        if(index == 0) {
            checkonly.splice(index, 1);
            checkonly.push("yes");
        }

        console.log(checkonly);
       
    } else {

        const index = checkonly.indexOf("yes");

        if(index == 0) {
            checkonly.splice(index, 1);
            checkonly.push("no");
        }

        console.log(checkonly);

    }

   

})





document.getElementById('submit').addEventListener('click', () => {


    let input2 = document.querySelector('#in2').value;

    let input3 = document.querySelector('#in3').value;

    let error = [];

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

    } else {

        document.querySelector('.err3').innerHTML = "";

    }


    if(error.length == 1 || error.length == 2) {

        console.log("1");

    } else {
        
        if(checkonly[0].trim() == "yes") {

            const token = document.getElementById('hid').value.trim()

            days = 30;

            date = new Date();

            date.setDate(date.getDate()+days);

            expires = date.toUTCString();

            details = {
                'key': token
            }

            details = JSON.stringify(details);

            document.cookie = `auth = ${details}; expires = ${expires};`;

            

            $.ajax({
                url: 'process/forms.php',
                method: 'POST',
                data: {
                    'email1': input2,
                    'password1': input3,
                    'token1': token,
                    'remem': "yes"
                },
                success: function(data) {

                    if(data.trim() == "err") {

                        window.location.href = "error";

                        document.querySelector('#in2').value = "";
                        document.querySelector('#in3').value = "";

                        
                        
                    }

                    if(data.trim() == "exist") {

                        document.querySelector('.exist').style.display = 'block';

                        document.querySelector('.exist').innerHTML = "User Does not Exit Please Sign Up";

                    
                        document.querySelector('#in2').value = "";
                        document.querySelector('#in3').value = "";
                        
                    }

                    if(data.trim() == "not") {

                        document.querySelector('.exist').style.display = 'block';

                        document.querySelector('.exist').innerHTML = "email/password is incorrect";

                    
                        document.querySelector('#in2').value = "";
                        document.querySelector('#in3').value = "";
                        
                    }


                    if(data.trim() == "yes") {

                    
                        document.querySelector('#in2').value = "";
                        document.querySelector('#in3').value = "";

                        window.location.href = "user";
                        
                    }


                }
            })


        }


        // no remember
        if(checkonly[0].trim() == "no") {

            const token = document.getElementById('hid').value.trim();

            $.ajax({
                url: 'process/forms.php',
                method: 'POST',
                data: {
                    'email1': input2,
                    'password1': input3,
                    'token1': token,
                    'remem': "no"
                },
                success: function(data) {

                    if(data.trim() == "err") {

                        window.location.href = "error";

                        document.querySelector('#in2').value = "";
                        document.querySelector('#in3').value = "";

                        
                        
                    }

                    if(data.trim() == "exist") {

                        document.querySelector('.exist').style.display = 'block';

                        document.querySelector('.exist').innerHTML = "User Does not Exit Please Sign Up";

                    
                        document.querySelector('#in2').value = "";
                        document.querySelector('#in3').value = "";
                        
                    }

                    if(data.trim() == "not") {

                        document.querySelector('.exist').style.display = 'block';

                        document.querySelector('.exist').innerHTML = "email/password is incorrect";

                    
                        document.querySelector('#in2').value = "";
                        document.querySelector('#in3').value = "";
                        
                    }


                    if(data.trim() == "yes") {

                    
                        document.querySelector('#in2').value = "";
                        document.querySelector('#in3').value = "";

                        window.location.href = "user";
                        
                    }


                }
            })

        }

        

    }

    


});