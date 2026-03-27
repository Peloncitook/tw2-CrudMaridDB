<?php function render($usuario) { ?>
<h1><i class="fas fa-user"></i> Detalles del Usuario</h1>

<div class="card">
    <table>
        <tr>
            <th>ID:</th>
            <td><?= htmlspecialchars($usuario['id']) ?></td>
        </tr>
        <tr>
            <th>Nombre:</th>
            <td><?= htmlspecialchars($usuario['nombre']) ?></td>
        </tr>
        <tr>
            <th>Apellido:</th>
            <td><?= htmlspecialchars($usuario['apellido']) ?></td>
        </tr>
        <tr>
            <th>Correo:</th>
            <td><?= htmlspecialchars($usuario['correo']) ?></td>
        </tr>
        <tr>
            <th>Celular:</th>
            <td><?= htmlspecialchars($usuario['celular'] ?? '-') ?></td>
        </tr>
        <tr>
            <th>Creado:</th>
            <td><?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($usuario['creado_en']))) ?></td>
        </tr>
        <tr>
            <th>Actualizado:</th>
            <td><?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($usuario['actualizado_en']))) ?></td>
        </tr>
    </table>
    
    <br>
    
    <div class="actions">
        <a href="index.php?action=edit&id=<?= $usuario['id'] ?>" class="btn btn-secondary"><i class="fas fa-edit"></i> Editar</a>
        <a href="index.php?action=delete&id=<?= $usuario['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</a>
        <a href="index.php?action=index" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</a>
    </div>
</div>
<?php } ?>
