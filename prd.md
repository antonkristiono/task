# Task Model

Fields:

- id
- title (string)
- status (pending | done)
- created_at

# Required Endpoints

- GET /api/tasks
- POST /api/tasks
- PUT /api/tasks/{id}
- DELETE /api/tasks/{id}

# Response Format

All API responses must follow this consistent structure:
{
"success": true,
"data": {},
"message": "Description message"
}
