const conversation_id = localStorage.getItem("conversation_id");

function loadMessages() {

    fetch("../backend/api/api.php?action=get_messages&id=" + conversation_id)
    .then(res => res.json())
    .then(data => {

        const chatBox = document.getElementById("chatBox");
        chatBox.innerHTML = "";

        data.forEach(msg => {
            chatBox.innerHTML += `<p>${msg.message}</p>`;
        });
    });
}

function sendMessage() {

    const message = document.getElementById("messageInput").value;

    fetch("../backend/api/api.php?action=send_message", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ conversation_id, message })
    })
    .then(() => {
        document.getElementById("messageInput").value = "";
        loadMessages();
    });
}

setInterval(loadMessages, 2000);
