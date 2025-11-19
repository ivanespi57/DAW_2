#!/bin/bash

# Script para testear la API RESTful del tablero Kanban
# AsegÃºrate de que tu servidor estÃ© corriendo en localhost:8000

API_URL="http://localhost/kanban/tasks.php"

echo "ðŸš€ Testeando API RESTful - Tablero Kanban"
echo "=========================================="
echo

# FunciÃ³n para mostrar respuesta formateada
show_response() {
    echo "ðŸ“‹ Respuesta:"
    echo "$1" | python3 -m json.tool 2>/dev/null || echo "$1"
    echo
    echo "---"
    echo
}

# 1. GET - Obtener todas las tareas
echo "1ï¸�âƒ£ GET - Obtener todas las tareas"
echo "curl -X GET $API_URL"
response=$(curl -s -X GET "$API_URL")
show_response "$response"

# 2. POST - Crear nueva tarea
echo "2ï¸�âƒ£ POST - Crear nueva tarea"
echo "curl -X POST $API_URL -H 'Content-Type: application/json' -d '{\"description\":\"Tarea de prueba\",\"status\":\"Today\",\"priority\":\"high\"}'"
response=$(curl -s -X POST "$API_URL" \
  -H "Content-Type: application/json" \
  -d '{"description":"Tarea de prueba","status":"Today","priority":"high"}')
show_response "$response"

# Extraer ID de la tarea creada para siguientes tests
TASK_ID=$(echo "$response" | python3 -c "import sys, json; print(json.load(sys.stdin)['id'])" 2>/dev/null || echo "1")

# 3. GET - Verificar que se creÃ³ la tarea
echo "3ï¸�âƒ£ GET - Verificar tareas despuÃ©s de crear"
echo "curl -X GET $API_URL"
response=$(curl -s -X GET "$API_URL")
show_response "$response"

# 4. PATCH - Actualizar solo el estado
echo "4ï¸�âƒ£ PATCH - Cambiar estado a 'In progress'"
echo "curl -X PATCH $API_URL?id=$TASK_ID -H 'Content-Type: application/json' -d '{\"status\":\"In progress\"}'"
response=$(curl -s -X PATCH "$API_URL?id=$TASK_ID" \
  -H "Content-Type: application/json" \
  -d '{"status":"In progress"}')
show_response "$response"

# 5. PUT - Actualizar tarea completa
echo "5ï¸�âƒ£ PUT - Actualizar tarea completa"
echo "curl -X PUT $API_URL?id=$TASK_ID -H 'Content-Type: application/json' -d '{\"description\":\"Tarea actualizada completamente\",\"status\":\"Done\",\"priority\":\"medium\"}'"
response=$(curl -s -X PUT "$API_URL?id=$TASK_ID" \
  -H "Content-Type: application/json" \
  -d '{"description":"Tarea actualizada completamente","status":"Done","priority":"medium"}')
show_response "$response"

# 6. DELETE - Eliminar la tarea
echo "6ï¸�âƒ£ DELETE - Eliminar tarea"
echo "curl -X DELETE $API_URL?id=$TASK_ID"
response=$(curl -s -X DELETE "$API_URL?id=$TASK_ID")
show_response "$response"

# 7. GET - Verificar que se eliminÃ³
echo "7ï¸�âƒ£ GET - Verificar tareas despuÃ©s de eliminar"
echo "curl -X GET $API_URL"
response=$(curl -s -X GET "$API_URL")
show_response "$response"

# 8. Casos de error
echo "8ï¸�âƒ£ CASOS DE ERROR"
echo

echo "â�Œ POST sin descripciÃ³n (Error 400)"
echo "curl -X POST $API_URL -H 'Content-Type: application/json' -d '{}'"
response=$(curl -s -X POST "$API_URL" \
  -H "Content-Type: application/json" \
  -d '{}')
show_response "$response"

echo "â�Œ PUT sin ID (Error 400)"
echo "curl -X PUT $API_URL -H 'Content-Type: application/json' -d '{\"description\":\"test\"}'"
response=$(curl -s -X PUT "$API_URL" \
  -H "Content-Type: application/json" \
  -d '{"description":"test"}')
show_response "$response"

echo "â�Œ DELETE con ID inexistente (Error 404)"
echo "curl -X DELETE $API_URL?id=99999"
response=$(curl -s -X DELETE "$API_URL?id=99999")
show_response "$response"

echo "âœ… Test completado!"
echo
echo "ðŸ’¡ Para usar manualmente:"
echo "   - Cambia localhost:8000 por tu URL"
echo "   - Usa los comandos curl mostrados arriba"
echo "   - Revisa las respuestas JSON"
