<?php

require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function index() {
        $usuarios = $this->modelo->getAll();
        return $usuarios;
    }

    public function view($id) {
        $usuario = $this->modelo->getById($id);
        
        if (!$usuario) {
            header('Location: index.php?action=index');
            exit;
        }
        
        return $usuario;
    }

    public function create() {
        $errores = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $apellido = trim($_POST['apellido'] ?? '');
            $correo = trim($_POST['correo'] ?? '');
            $celular = trim($_POST['celular'] ?? '');

            if (empty($nombre)) {
                $errores[] = 'El nombre es requerido';
            }
            if (empty($apellido)) {
                $errores[] = 'El apellido es requerido';
            }
            if (empty($correo)) {
                $errores[] = 'El correo es requerido';
            } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $errores[] = 'El correo no es válido';
            } elseif ($this->modelo->existeCorreo($correo)) {
                $errores[] = 'El correo ya está registrado';
            }

            if (empty($errores)) {
                if ($this->modelo->create($nombre, $apellido, $correo, $celular)) {
                    header('Location: index.php?action=index');
                    exit;
                } else {
                    $errores[] = 'Error al crear el usuario';
                }
            }
        }

        return $errores;
    }

    public function edit($id) {
        $errores = [];
        $usuario = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $apellido = trim($_POST['apellido'] ?? '');
            $correo = trim($_POST['correo'] ?? '');
            $celular = trim($_POST['celular'] ?? '');

            if (empty($nombre)) {
                $errores[] = 'El nombre es requerido';
            }
            if (empty($apellido)) {
                $errores[] = 'El apellido es requerido';
            }
            if (empty($correo)) {
                $errores[] = 'El correo es requerido';
            } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $errores[] = 'El correo no es válido';
            } elseif ($this->modelo->existeCorreo($correo, $id)) {
                $errores[] = 'El correo ya está registrado por otro usuario';
            }

            if (empty($errores)) {
                if ($this->modelo->update($id, $nombre, $apellido, $correo, $celular)) {
                    header('Location: index.php?action=index');
                    exit;
                } else {
                    $errores[] = 'Error al actualizar el usuario';
                }
            }
        } else {
            $usuario = $this->modelo->getById($id);
            if (!$usuario) {
                header('Location: index.php?action=index');
                exit;
            }
        }

        return ['errores' => $errores, 'usuario' => $usuario];
    }

    public function delete($id) {
        $usuario = $this->modelo->getById($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $usuario) {
            if ($this->modelo->delete($id)) {
                header('Location: index.php?action=index');
                exit;
            }
        }

        return $usuario;
    }
}
