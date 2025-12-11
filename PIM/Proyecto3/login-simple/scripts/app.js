// LOGIN ---------------------
document.getElementById('loginForm').addEventListener('submit', async e=>{
    e.preventDefault();
    const user = document.getElementById('user').value;
    const pass = document.getElementById('pass').value;
    const msg  = document.getElementById('msg');

    const r = await fetch("php/login.php", {
        method:"POST",
        headers:{"Content-Type":"application/json"},
        body:JSON.stringify({user, pass})
    });

    const j = await r.json();

    if(j.success){
        window.location = "php/welcome.php";
    } else {
        msg.textContent = j.message;
        setTimeout(()=> msg.textContent="",2000);
    }
});

// REGISTRO --------------------
document.getElementById('regForm').addEventListener('submit', async e=>{
    e.preventDefault();

    const user = document.getElementById('newUser').value;
    const pass = document.getElementById('newPass').value;
    const msgR = document.getElementById('msgReg');

    const r = await fetch("php/register.php", {
        method:"POST",
        headers:{"Content-Type":"application/json"},
        body:JSON.stringify({user, pass})
    });

    const j = await r.json();

    if(j.success){
        msgR.style.color = "green";
        msgR.textContent = "Registrado correctamente. Ya puedes iniciar sesión.";
    } else {
        msgR.style.color = "red";
        msgR.textContent = j.message;
    }

    setTimeout(()=> msgR.textContent="",3000);
});
