function loginValidate(){
    let name = document.forms[0].username.value;
    if (name.includes("@")){
        let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    }

    else{
        let regex = /(\w|_)+$/;
    }

    if (name.match(regex)){
        document.forms[0].username.style.borderColor = "black";
        return true
    }

    else{
        document.forms[0].username.style.borderColor = "red";
        return false 
    }

}

function signupValidate(){
    let flag = false;
    let username = document.forms[0].username
    let password = document.forms[0].password
    let regexUsername = /(\w|_)+$/;
    let regexPassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/gm;
    if(!(username.value.match(regexUsername))){
        username.style.borderColor = "red";
    }
    else{
        username.style.borderColor = "black";
    }
    if (!(password.value.match(regexPassword))){
        password.style.borderColor = "red";
    }
    else{
        password.style.borderColor = "black"
    }
    if(password.value.match(regexPassword) && username.value.match(regexUsername)){
        return true
    }
    return false
}