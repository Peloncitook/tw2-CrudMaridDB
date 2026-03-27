<?php function render($usuario, $errores = [], $old = []) { ?>
<h1>Editar Usuario</h1>

<div class="card">
    <?php if (!empty($errores)): ?>
        <div class="alert alert-error">
            <?php foreach ($errores as $e): ?>
                <p><?= htmlspecialchars($e) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($old['nombre'] ?? $usuario['nombre']) ?>" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($old['apellido'] ?? $usuario['apellido']) ?>" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($old['correo'] ?? $usuario['correo']) ?>" required>
        </div>

        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" id="celular" name="celular" value="<?= htmlspecialchars($old['celular'] ?? $usuario['celular']) ?>">
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="index.php?action=index" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php } ?>
