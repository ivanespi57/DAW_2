/* Módulo principal del frontend: TaskAPI y la parte de UI ligera
   Contenido migrado desde `tasks.js` y adaptado a la nueva estructura.
*/

const API_URL = './php/api/tasks.php';

class TaskAPI {

    static validateTask(description, status, priority) {
        if (!description || typeof description !== 'string'){
            throw new Error('La descripción debe ser un texto válido.');
        }

        const validStatus = ['deleted','Some day','To do', 'This week','Tomorrow','Today', 'In progress', 'Done'];
        if (status && !validStatus.includes(status)) {
            throw new Error(`Estado inválido. Valores permitidos: ${validStatus.join(', ')}`);
        }

        const validPriority = ['low', 'medium', 'high','top'];
        if (priority && !validPriority.includes(priority)) {
            throw new Error(`Prioridad inválida. Valores permitidos: ${validPriority.join(', ')}`);
        }
    }

    static async handleResponse(response) {
        if (!response.ok) {
            const errorText = await response.text();
            throw new Error(`Error HTTP ${response.status}:${errorText || 'Respuesta no válida'}`);
        }

        try {
            return await response.json();
        } catch {
            throw new Error('La respuesta del servidor no es JSON válido.');
        }
    }

    static async getTasks() {
        const response = await fetch(API_URL);
        return await this.handleResponse(response);
    }

    static async createTask(description, status = 'Some day', priority = 'medium') {
        this.validateTask(description, status, priority);
        const response = await fetch(API_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify({ description, status, priority })
        });
        return await this.handleResponse(response);
    }

    static async updateTask(id, description, status, priority) {
        this.validateTask(description, status, priority);
        const response = await fetch(`${API_URL}?id=${id}`, {
            method: 'PUT',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ description, status, priority })
        });
        return await this.handleResponse(response);
    }

    static async patchTask(id, fields) {
        const response = await fetch(`${API_URL}?id=${id}`, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(fields)
        });
        return await this.handleResponse(response);
    }

    static async deleteTask(id) {
        const response = await fetch(`${API_URL}?id=${id}`, { method: 'DELETE' });
        return await this.handleResponse(response);
    }
}

/* Carga una interfaz básica si no existe una implementación más completa. */
document.addEventListener('DOMContentLoaded', async () => {
    const app = document.getElementById('app');
    app.innerHTML = `
        <div style="padding:24px;font-family:Arial,Helvetica,sans-serif;">
            <h1>Gestor Kanban (interfaz mínima)</h1>
            <p>Abre <code>index.html</code> y conecta con la API en <code>${API_URL}</code>.</p>
            <p>Si quieres, puedo migrar el HTML completo y el CSS existente dentro de esta estructura.</p>
        </div>
    `;
});
