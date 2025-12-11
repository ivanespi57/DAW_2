document.getElementById('loginForm').addEventListener('submit', async function(e){
    e.preventDefault();

    const user = document.getElementById('user').value;
    const pass = document.getElementById('pass').value;
    const msg  = document.getElementById('msg');

    const r = await fetch("php/login.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({user, pass})
    });

    const j = await r.json();

    if(j.success){
        window.location = "php/welcome.php";
    } else {
        msg.textContent = j.message;
        setTimeout(()=>msg.textContent="",2000);
    }
});
