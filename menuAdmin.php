<?php

switch ($_SESSION['ID_Rol']) {

    case TypeUsuario::ADMINISTRADOR:

        echo '<div id="contenedorMenu">

            <div id="contendorTablaMenu">
                <h1 id="tituloMenu">Menu</h1>
                <ul id="menuv">
                    <li><a href="usuario.php" class="efectoMenu" id="opcionUsuario">Usuario</a></li>
                    <li><a href="rol.php" class="efectoMenu" id="opcionRol">Rol</a></li>
                    <li><a href="cargo.php" class="efectoMenu" id="opcionCag">Cargo</a></li>
                    <li><a href="organizacion.php" class="efectoMenu" id="opcionOrg">Organizacion</a></li>
                    <li><a href="departamento.php" class="efectoMenu" id="opcionDpto">Departamento</a></li>
                    <li><a href="categoria.php" class="efectoMenu" id="opcionCategoria">Categoria</a></li>
                    <li><a href="subcategoria.php" class="efectoMenu" id="subcategoria">SubCategoria</a></li>
                    <li><a href="#" class="efectoMenu" id="opcionPub">Publicacion</a>
                        <ul id="c">
                            <li><a href="publicacion.php" class="efectoMenu" id="pcategorias">Ver</a></li>
                            <li><a href="categoriaparapublicar.php" class="efectoMenu" id="pcategorias">Registrar</a></li>
                        </ul>
                    </li>

                </ul>


            </div>


        </div>';

        break;

    case TypeUsuario::AUTORIZADOR:

        echo '<div id="contenedorMenu">
            <div id="contendorTablaMenu">
                <h1 id="tituloMenu">Menu</h1>
                <ul id="menuv">
                    <li><a href="#" class="efectoMenu" id="opcionPub">Publicacion</a>
                        <ul id="c">
                            <li><a href="publicacion.php" class="efectoMenu" id="pcategorias">Ver</a></li>
                            <li><a href="categoriaparapublicar.php" class="efectoMenu" id="pcategorias">Registrar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
	</div>';

        break;

    case TypeUsuario::EDITOR:

        echo '<div id="contenedorMenu">
            <div id="contendorTablaMenu">
                <h1 id="tituloMenu">Menu</h1>
                <ul id="menuv">
                    <li><a href="#" class="efectoMenu" id="opcionPub">Publicacion</a>
                        <ul id="c">
                            <li><a href="publicacion.php" class="efectoMenu" id="pcategorias">Ver</a></li>
                            <li><a href="categoriaparapublicar.php" class="efectoMenu" id="pcategorias">Registrar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
	</div>';

        break;

    case TypeUsuario::LECTOR:

        echo '<div id="contenedorMenu">
            <div id="contendorTablaMenu">
                <h1 id="tituloMenu">Menu</h1>
                <ul id="menuv">
                    <li><a href="#" class="efectoMenu" id="opcionPub">Publicacion</a>
                        <ul id="c">
                            <li><a href="publicacion.php" class="efectoMenu" id="pcategorias">Ver</a></li>
                            <li><a href="categoriaparapublicar.php" class="efectoMenu" id="pcategorias">Registrar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
	</div>';

        break;

    case TypeUsuario::PUBLICADOR:

        echo '<div id="contenedorMenu">
            <div id="contendorTablaMenu">
                <h1 id="tituloMenu">Menu</h1>
                <ul id="menuv">
                    <li><a href="#" class="efectoMenu" id="opcionPub">Publicacion</a>
                        <ul id="c">
                            <li><a href="publicacion.php" class="efectoMenu" id="pcategorias">Ver</a></li>
                            <li><a href="categoriaparapublicar.php" class="efectoMenu" id="pcategorias">Registrar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
	</div>';

        break;

    default :

        break;
}
