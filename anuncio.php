<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al Bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading=lazy src="build/img/destacada.jpg" alt="Imagen Destacada">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam aliquam ut ipsam, repellat obcaecati nihil reiciendis earum, corrupti, dignissimos minus architecto corporis fugiat sint voluptas nostrum sit reprehenderit! Quisquam, omnis.
            Tempore pariatur id distinctio illo repellendus nemo alias molestias voluptatem, in quos, doloremque dolorum possimus odio porro delectus. Ipsum ipsa eaque autem. Fuga molestiae autem quod recusandae, repudiandae suscipit repellat?
            Quas quidem quasi nulla at, corporis voluptas natus placeat dolorum consequuntur dolorem impedit aut soluta maiores neque officiis rem debitis repudiandae repellendus. Temporibus autem exercitationem in voluptatibus enim cum quam?
            Veniam itaque, ullam quo veritatis, obcaecati eveniet ducimus cumque quis rerum commodi ipsum eaque! Sapiente beatae cumque ipsa, nam consectetur vel possimus doloremque ipsum itaque perspiciatis fugit quaerat placeat nemo!
            Veritatis illo id, quaerat obcaecati veniam laboriosam perspiciatis blanditiis explicabo officiis consequuntur. Impedit nesciunt id molestias adipisci voluptatibus magni praesentium veniam saepe, doloribus dolores quibusdam a! Ad facilis aut explicabo.
            Facere error repellendus aspernatur libero architecto non enim quod praesentium sint alias, dolore beatae ullam explicabo in vel. Porro officiis blanditiis debitis quidem iure, libero minus perspiciatis recusandae quo quia.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam repellendus nam voluptas, dolor aperiam, natus a deserunt delectus doloribus molestiae dolore provident perferendis ut pariatur asperiores architecto fugiat. Maxime, et!
            Maxime, perspiciatis doloremque aspernatur error iusto quasi quia aut harum, sed accusamus voluptas dolore, eveniet hic asperiores deleniti voluptatibus commodi ipsa ex debitis tenetur praesentium pariatur minima ipsam. Hic, facere.</p>
        </div>
    </main>

<?php 
    incluirTemplate('footer');
?>