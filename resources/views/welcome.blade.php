<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentacion</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>

    <header class="header" id="inicio">
        <img class="hamburguer" src="img/hamburguesa.svg" alt="">
        <nav class="menu-navegacion">
            <a href="#inicio">Inicio</a>
            <a href="#sobre nosotros">Sobre Nosotros</a>
            <a href="#servicio">Servicio</a>
            <a href="#galeria">Catálogo</a>
            <a href="#footer">Contacto</a>

        </nav>
        <div class="contenedor head">
            <h1 class="titulo">INSUCONS</h1>
            <p class="copy">Nuestro sistema para constructoras sirve a empresas de todos los tamaños, pues crece junto
                a su operacion, y cubre el presupuesto, planificacion, ejecucion y seguimiento de la obra, de forma
                detallada e incluye una apps para registros directos. Reduce costos y ten el control total de la
                operación con nuestro sistema para construcción
            </p>

            <form class="" action="{{ route('login') }}" method="get">
                <input type="submit" value="Acceder">
            </form>

        </div>
    </header>






    <section class="contenedor seccion"id="sobre nosotros">
        <h2 class="fw-300 centrar-texto">MAS SOBRE NOSOTROS</h2>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="{{ asset('img/icono1.svg') }}" alt="Icono Seguridad">
                <h3>SEGURIDAD</h3>
                <P> Totalmente seguro, tiene todas las medidas de seguridad sin pagar de más. Podrás acceder a tu
                    información y supervisar tu negocio en tiempo real desde cualquier dispositivo con Internet, así
                    como recibir actualizaciones automáticas sin costo adicional.</P>
            </div>

            <div class="icono">
                <img src="{{ asset('img/icono2.svg') }}" alt="Icono Mejor Precio">
                <h3>EL MEJOR PRECIO</h3>
                <P> Ofrece al cliente un servicio de financiación con una forma de pago cómoda y sin intereses.
                    Herramienta perfecta para incrementar el volumen de tu negocio.
                    Cobra por adelantado la totalidad del servicio.</P>
            </div>

            <div class="icono">
                <img src="{{ asset('img/icono3.svg') }}" alt="Icono a Tiempo">
                <h3>A TIEMPO</h3>
                <P> Control confiable de plazos, costos, contratos y documentación.
                    Optimiza el control de tus proyecto, puedes realizar un control de forma eficiente de los proyectos:
                    el manejo de contratistas, la afectación de máquinas al trabajo y de recursos en cada ítem de obra.
                </P>
            </div>
        </div>
    </section>

    <main>
        <section class="services contenedor" id="servicio">
            <h2 class="subtitulo">NUESTROS SERVICIOS</h2>
            <div class="contenedor-servicio">
                <img src="{{ asset('img/checklist.svg') }}" alt="">
                <div class="checklist-servicio">
                    <div class="service">
                        <h3 class="n-service"><span class="number">1</span>TRABAJOS PRELIMINARES</h3>
                        <p> Instalacion de faenas, limpieza del terreno, replanteo y trazado, excavacion comun 0-2 mts,
                            relleno y compacto s/tierra.</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">2</span>HORMIGONES</h3>
                        <p> H.A. zapatas, H.A. columnas, H.A. vigas portamuros, H.A. viga cadena.</p>
                    </div>
                    <div class="service">
                        <h3 class="n-service"><span class="number">3</span>PISOS Y REVESTIMIENTOS</h3>
                        <p> Pisp de porcelanato, zocalo de porcenalato, revestimiento de baño, revestimineto de cocina.
                        </p>
                    </div>

                    <div class="service">
                        <h3 class="n-service"><span class="number">4</span>INSTALACIONES ELECTRICAS</h3>
                        <p> E. Acometida electrica medidor, E. Tablero de electricidad, E. entubado TV, E. circuito de
                            iluminacion, E. punto de iluminacion + foco y soquete. </p>
                    </div>

                    <div class="service">
                        <h3 class="n-service"><span class="number">5</span>INSTALACIONES HIDROSANITARIAS Y PLUVIAL</h3>
                        <p> IH Instalacion fusion agua fria y agua caliente, Instalacion inodoro P. Artefacto,
                            Accesorios de baño + instalacion, instalacion pluvial.</p>
                    </div>

                    <div class="service">

                    </div>
                </div>
        </section>


        <section class="gallery" id="galeria">
            <div class="contenedor">
                <h2 class="subtitulo">CATÁLOGO</h2>
                <div class="contenedor-galeria">
                    <img src="{{ asset('img/arenas1.png') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/cemento1.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/material3.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/material10.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/material11.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/material9.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/material5.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/material6.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/material8.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/material7.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/material4.jpg') }}" class="img-galeria" alt="">
                    <img src="{{ asset('img/maquinarias2.jpg') }}" class="img-galeria" alt="">
                </div>
            </div>
        </section>
        <div class="imagen-light">
            <img src="{{ asset('img/close.svg') }}" alt="" class="close">
            <img src="" alt="" class="agregar-imagen">
        </div>
    </main>


    <footer id="footer">
        <div class="contenedor footer-content">
            <div class="contact-us">
                <h2 class="brand">CONTÁCTANOS</h2>
                <p>Estamos siempre contigo para ayudarte a alcanzar el éxito.</p>
            </div>
            <div class="social-media">

                <a href="./" class="social-media-icon">
                    <i class='bx bxl-whatsapp-square'></i>
                </a>
            </div>
        </div>
        <div class="line"></div>
    </footer>


    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>

</body>

</html>
