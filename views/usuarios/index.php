<?php function render($usuarios) { ?>
<div class="header">
    <h1><i class="fas fa-users"></i> Usuarios</h1>
    <a href="index.php?action=create" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Usuario</a>
</div>

<?php if (empty($usuarios)): ?>
    <div class="card">
        <p class="empty">No hay usuarios registrados.</p>
    </div>
<?php else: ?>
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['id']) ?></td>
                    <td><?= htmlspecialchars($u['nombre']) ?></td>
                    <td><?= htmlspecialchars($u['apellido']) ?></td>
                    <td><?= htmlspecialchars($u['correo']) ?></td>
                    <td><?= htmlspecialchars($u['celular'] ?? '-') ?></td>
                    <td class="text-muted"><?= htmlspecialchars(date('d/m/Y H:i', strtotime($u['creado_en']))) ?></td>
                    <td class="actions">
                        <a href="index.php?action=view&id=<?= $u['id'] ?>" class="btn btn-info btn-sm btn-icon" title="Ver"><i class="fas fa-eye"></i></a>
                        <a href="index.php?action=edit&id=<?= $u['id'] ?>" class="btn btn-secondary btn-sm btn-icon" title="Editar"><i class="fas fa-edit"></i></a>
                        <a href="index.php?action=delete&id=<?= $u['id'] ?>" class="btn btn-danger btn-sm btn-icon" title="Eliminar"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; } ?>
