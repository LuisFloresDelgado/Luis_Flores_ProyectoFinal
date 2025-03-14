<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Iniciar Sesión</h4>
                </div>
                <div class="card-body p-4">
                    <?php if (isset($data['login'])): ?>
                        <div class="alert alert-danger"><?php echo $data['login']; ?></div>
                    <?php endif; ?>
                    
                   <form action="index.php?controller=UsuariosController&action=login" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Usuario</label>
        <div class="input-group">
            <span class="input-group-text">👤</span>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
    </div>
    <div class="mb-4">
        <label for="password" class="form-label">Contraseña</label>
        <div class="input-group">
            <span class="input-group-text">🔒</span>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
    </div>
    <div class="d-grid">
        <button type="submit" name="login" class="btn btn-primary">
            Iniciar Sesión
        </button>
    </div>
</form>
                    
                </div>
            </div>
        </div>
    </div>
</div>