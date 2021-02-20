<?php 
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
       

        <form class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" placeholder="Titulo Propiedad">

                <label for="precio">Precio: </label>
                <input type="number" id="precio" placeholder="Precio Propiedad" min="1">

                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png"> 

                <label for="descripcion">Descripcion: </label>
                <textarea name="descripcion" id="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones: </label>
                <input type="number" id="habitaciones" placeholder="Cantidad de Habitaciones" min="1" max="9">
            
                <label for="baños">Baños: </label>
                <input type="number" id="baños" placeholder="Cantidad de Baños" min="1" max="9">
                
                <label for="estacionamientos">Estacionamientos: </label>
                <input type="number" id="estacionamientos" placeholder="Cantidad de Estacionamientos" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select>
                    <option value="1">Jhonatan</option>
                    <option value="2">Axel</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

        <a href="/admin" class="boton boton-verde">Volver</a>
    </main>

<?php 
    incluirTemplate('footer');
?>