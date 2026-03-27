<?php function render($errores = [], $old = []) { ?>
<h1>Nuevo Usuario</h1>

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
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($old['nombre'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($old['apellido'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($old['correo'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" id="celular" name="celular" value="<?= htmlspecialchars($old['celular'] ?? '') ?>">
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="index.php?action=index" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
<?php } ?>
