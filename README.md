# Usuarios CRUD - PHP Puro (MVC)

Aplicación PHP con estructura MVC para gestionar usuarios.

## Requisitos

- PHP 7.4+
- MariaDB/MySQL
- Extensiones: pdo_mysql

## Instalación

1. Crear la base de datos:
```bash
mysql -u root -p < db01.sql
```

2. Configurar credenciales en `config/database.php`

3. Ejecutar con servidor PHP:
```bash
cd public
php -S localhost:8080
```

4. Acceder a: `http://localhost:8080`

## Estructura

```
usuariosCRUD/
├── config/          # Configuración de DB
├── models/          # Modelo Usuario
├── controllers/     # UsuarioController
├── views/           # Vistas (layout + usuarios)
├── public/          # Entry point (index.php)
└── db01.sql         # Esquema de base de datos
```

## Docker (opcional)

```bash
docker-compose up -d
```

Puerto: 8082

## Operaciones

- **Listar usuarios**: `?action=index`
- **Crear usuario**: `?action=create`
- **Ver usuario**: `?action=view&id=1`
- **Editar usuario**: `?action=edit&id=1`
- **Eliminar usuario**: `?action=delete&id=1`