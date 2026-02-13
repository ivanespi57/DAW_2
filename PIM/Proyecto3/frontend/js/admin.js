function loadConversations(){

    fetch("../backend/api/api.php?action=admin_get_conversations")
    .then(res => res.json())
    .then(data => {

        const container = document.getElementById("conversations");
        container.innerHTML = "";

        data.forEach(conv => {
            container.innerHTML += `
                <div>
                    <p>Código: ${conv.code}</p>
                    <p>Estado: ${conv.status}</p>
                </div>
                <hr>
            `;
        });
    });
}

loadConversations();
