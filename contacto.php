<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imagen Contacto">
        </picture>
        
        <h2>Llene el Formulario de Contacto</h2>
        <form class="formulario" action="">
            <fieldset> <!-- Agrupa datos dentro del formulario-->
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label> <!-- El for para que cuando de click en el label se active el input-->
                <input type="text" id="nombre" placeholder="Digita Tu Nombre">
            
                <label for="email">E-Mail</label> 
                <input type="email" id="email" placeholder="Digita Tu E-Mail">
            
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" placeholder="Digita Tu Teléfono">
            
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Sobre La Propiedad</legend>
                
                <label for="opciones">Vende o Compra</label>
                <select id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" id="Presupuesto" placeholder="Tu precio o Presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Cómo desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                
                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email">
                </div>

                <p>Si eligió teléfono. Elija la fecha y la hora</p>
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">
                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>

    </main>

<?php 
    incluirTemplate('footer');
?>