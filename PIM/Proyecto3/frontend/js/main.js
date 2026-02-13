function createConversation() {

    const password = document.getElementById("newPassword").value;

    fetch("../backend/api/api.php?action=create_conversation", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ password })
    })
    .then(res => res.json())
    .then(data => {
        alert("Tu código es: " + data.code);
    });
}

function loginConversation() {

    const code = document.getElementById("code").value;
    const password = document.getElementById("password").value;

    fetch("../backend/api/api.php?action=login_conversation", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ code, password })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            localStorage.setItem("conversation_id", data.id);
            window.location.href = "chat.html";
        } else {
            alert("Datos incorrectos");
        }
    });
}
