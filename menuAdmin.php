<?php

switch ($_SESSION['ID_Rol']) {

    case TypeUsuario::ADMINISTRADOR:

        echo '<div id="contenedorMenu">

            <div id="contendorTablaMenu">
                <h1 id="tituloMenu">Menu</h1>
                <ul id="menuv">
                    <li><a href="#" class="efectoMenu" id="opcionCag">Cargo</a></li>
                    <li><a href="#" class="efectoMenu" id="opcionCategoria">Categoria</a></li>
                    <li><a href="#" class="efectoMenu" id="subcategoria">SubCategoria</a></li>
                    <li><a href="#" class="efectoMenu" id="opcionDpto">Departamento</a></li>
                    <li><a href="#" class="efectoMenu" id="opcionOrg">Organizacion</a></li>
                    <li><a href="#" class="efectoMenu" id="opcionPub">Publicacion</a>
                        <ul id="c">
                            <li><a href="#" class="efectoMenu" id="pcategorias">Categorias</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="efectoMenu" id="opcionRol">Rol</a></li>
                    <li><a href="#" class="efectoMenu" id="opcionUsuario">Usuario</a></li>
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
                                <li><a href="#" class="efectoMenu" id="pcategorias">Categorias</a></li>
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
                                <li><a href="#" class="efectoMenu" id="pcategorias">Categorias</a></li>
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
                                <li><a href="#" class="efectoMenu" id="pcategorias">Categorias</a></li>
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
                                <li><a href="#" class="efectoMenu" id="pcategorias">Categorias</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
	</div>';

        break;

    default :

        break;
}
