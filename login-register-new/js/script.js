const show = document.querySelector("#show");

show.addEventListener('click', function(){
    const pw = document.querySelector("#password");
    const cpw = document.querySelector("#cpassword");
    
    if(pw.type === "password"){ 
        pw.type = "text";
    }else {
        pw.type = "password";  
    }

    if(cpw.type === "password"){ 
        cpw.type = "text";
    }else {
        cpw.type = "password";  
    }
});

