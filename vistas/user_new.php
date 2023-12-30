<main class="flex flex-col w-full px-6 mt-6">
    <h2 class="text-2xl font-bold text-center">Usuarios</h2>
    <p class="p-1 mt-4 text-center text-white bg-blue-700 w-36">Nuevos usuarios</p>

    <div class="flex flex-wrap items-center justify-center w-full">
        <form method="post" class="flex flex-col justify-center mt-8 gap-y-10 FormularioAjax"  action="../php/usuarioGuardar.php">
            <div class="flex flex-wrap items-center gap-x-2">
                <div class="flex flex-col">
                    <label for="">Nombre</label>
                    <input type="text" placeholder="ingrese el nombre" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required class="input input-bordered input-primary">
                </div>

                <div class="flex flex-col">
                    <label for="">Apellidos</label>
                    <input type="text" placeholder="ingrese su apellido" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required class="input input-bordered input-primary">
                </div>

                <div class="flex flex-col">
                    <label>Usuario</label>
                    <input type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required class="input input-bordered input-primary" placeholder="ingrese un usuario">
                </div>

                <div class="flex flex-col">
                    <label>Correo</label>
                    <input type="text" name="usuario_correo"   required class="input input-bordered input-primary" placeholder="ingrese un usuario">
                </div>

                <div class="flex flex-col">
                    <label>Clave</label>
                    <input type="text" name="clave_1" pattern="[a-zA-Z0-9$@.\-]{7,100}" maxlength="20" required class="input input-bordered input-primary" placeholder="ingrese un usuario">
                </div>

                <div class="flex flex-col">
                    <label>repetir Clave</label>
                    <input type="text" name="clave_2" pattern="[a-zA-Z0-9$@.\-]{7,100}" maxlength="20" required class="input input-bordered input-primary" placeholder="ingrese un usuario">
                </div>

            </div>
            <button type="submit" class = "btn btn-primary w-36">Guardar</button>
        </form>
    </div>

    <div class = "form-rest">
        
    </div>
</main>