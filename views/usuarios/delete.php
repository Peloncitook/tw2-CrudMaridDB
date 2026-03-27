<?php function render($usuario) { ?>
<h1>Eliminar Usuario</h1>

<div class="card">
    <p>¿Estás seguro de que deseas eliminar al usuario <strong><?= htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']) ?></strong>?</p>
    <p class="text-muted">Correo: <?= htmlspecialchars($usuario['correo']) ?></p>
    
    <br>
    
    <form method="POST">
        <div class="actions">
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="index.php?action=index" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php } ?>
