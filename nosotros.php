<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="historia">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading=lazy src="build/img/nosotros.jpg" alt="Imagen Seccion Nosotros">
                </picture>
                <section>
                    <h4>25 Años de Experiencia</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem aspernatur a animi labore excepturi ea, commodi quae nemo architecto inventore quisquam molestias voluptate ipsam facere, dolore enim cupiditate, aperiam iste.
                    Dolore officiis assumenda blanditiis nesciunt, eveniet, itaque voluptas, tempore sit doloribus quaerat voluptatibus voluptatum ratione minus. Corrupti, eos laborum? Ab, nisi praesentium! Minima pariatur ducimus rerum debitis eveniet omnis.</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint voluptate consequuntur laborum ut ex. Nobis, iure tenetur? Facilis soluta tempora aperiam quos sequi nihil praesentium aut, explicabo doloribus dolorum consectetur!?</p>
                </section>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque, vel libero doloribus id cum nesciunt ut placeat recusandae pariatur. Aliquid voluptates, ipsam officiis cumque ab officia harum quae voluptatum.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque, vel libero doloribus id cum nesciunt ut placeat recusandae pariatur. Aliquid voluptates, ipsam officiis cumque ab officia harum quae voluptatum.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque, vel libero doloribus id cum nesciunt ut placeat recusandae pariatur. Aliquid voluptates, ipsam officiis cumque ab officia harum quae voluptatum.</p>
            </div>
        </div>
    </section>
<?php 
    incluirTemplate('footer');
?>