<?php

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Usuario.php';
require_once __DIR__ . '/controllers/UsuarioController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controller = new UsuarioController();

ob_start();

switch ($action) {
    case 'index':
        $usuarios = $controller->index();
        include __DIR__ . '/views/usuarios/index.php';
        render($usuarios);
        break;

    case 'view':
        if (!$id) {
            header('Location: index.php?action=index');
            exit;
        }
        $usuario = $controller->view($id);
        include __DIR__ . '/views/usuarios/view.php';
        render($usuario);
        break;

    case 'create':
        $errores = $controller->create();
        include __DIR__ . '/views/usuarios/create.php';
        render($errores, $_POST);
        break;

    case 'edit':
        if (!$id) {
            header('Location: index.php?action=index');
            exit;
        }
        $result = $controller->edit($id);
        include __DIR__ . '/views/usuarios/edit.php';
        render($result['usuario'], $result['errores'], $_POST);
        break;

    case 'delete':
        if (!$id) {
            header('Location: index.php?action=index');
            exit;
        }
        $usuario = $controller->delete($id);
        if (!$usuario) {
            header('Location: index.php?action=index');
            exit;
        }
        include __DIR__ . '/views/usuarios/delete.php';
        render($usuario);
        break;

    default:
        header('Location: index.php?action=index');
        exit;
}

$contenido = ob_get_clean();

include __DIR__ . '/views/layout.php';
