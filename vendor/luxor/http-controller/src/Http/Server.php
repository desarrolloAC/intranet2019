<?php

/*
 * Copyright 2018 brayan.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Luxor\HttpController\Http;

/**
 * Description of Server
 *
 * @author brayan
 */
class Server {
    
    /**
     * El nombre del archivo de script ejecutándose actualmente, relativa al directorio 
     * raíz de documentos del servidor. Por ejemplo, el valor de $_SERVER['PHP_SELF'] 
     * en un script ejecutado en la dirección http://example.com/foo/bar.php será 
     * /foo/bar.php. La constante __FILE__ contiene la ruta completa del fichero actual, 
     * incluyendo el nombre del archivo. Si PHP se está ejecutando como un proceso de 
     * línea de comando, esta variable es el nombre del script desde PHP 4.3.0. En 
     * anteriores versiones no estaba disponible.
     */
    const PHP_SELF = 'PHP_SELF';
    
    /**
     * Número de revisión de la especificación CGI que está empleando el servidor, 
     * por ejemplo 'CGI/1.1'.
     */
    const GATEWAY_INTERFACE = 'GATEWAY_INTERFACE';
    
    /**
     * La dirección IP del servidor donde se está ejecutando actualmente el script.
     */
    const SERVER_ADDR = 'SERVER_ADDR';
    
    /**
     * El nombre del host del servidor donde se está ejecutando actualmente el 
     * script. Si el script se ejecuta en un host virtual se obtendrá el valor 
     * del nombre definido para dicho host virtual.
     */
    const SERVER_NAME = 'SERVER_NAME';
    
    /**
     * Cadena de identificación del servidor dada en las cabeceras de respuesta 
     * a las peticiones.
     */
    const SERVER_SOFTWARE = 'SERVER_SOFTWARE';
    
    /**
     * Nombre y número de revisión del protocolo de información a través del cual 
     * la página es solicitada, por ejemplo 'HTTP/1.0'.
     */
    const SERVER_PROTOCOL = 'SERVER_PROTOCOL';
    
    /**
     * Método de petición empleado para acceder a la página, es decir 'GET', 
     * 'HEAD', 'POST', 'PUT'.
     */
    const REQUEST_METHOD = 'REQUEST_METHOD';
    
    /**
     * Fecha Unix de inicio de la petición. Disponible desde PHP 5.1.0.
     */
    const REQUEST_TIME = 'REQUEST_TIME';
    
    /**
     * El timestamp del inicio de la solicitud, con precisión microsegundo. 
     * Disponible desde PHP 5.4.0.
     */
    const REQUEST_TIME_FLOAT = 'REQUEST_TIME_FLOAT';
    
    /**
     * Si existe, la cadena de la consulta de la petición de la página.
     */
    const QUERY_STRING = 'QUERY_STRING';
    
    /**
     * El directorio raíz de documentos del servidor en el cual se está ejecutando 
     * el script actual, según está definida en el archivo de configuración del 
     * servidor.
     */
    const DOCUMENT_ROOT = 'DOCUMENT_ROOT';
    
    /**
     * Contenido de la cabecera Accept: de la petición actual, si existe.
     */
    const HTTP_ACCEPT = 'HTTP_ACCEPT';
    
    /**
     * Contenido de la cabecera Accept-Charset: de la petición actual, si existe. 
     * Por ejemplo: 'iso-8859-1,*,utf-8'.
     */
    const HTTP_ACCEPT_CHARSET = 'HTTP_ACCEPT_CHARSET';
    
    /**
     * Contenido de la cabecera Accept-Encoding: de la petición actual, si existe. 
     * Por ejemplo: 'gzip'.
     */
    const HTTP_ACCEPT_ENCODING = 'HTTP_ACCEPT_ENCODING';
    
    /**
     * Contenido de la cabecera Accept-Language: de la petición actual, si existe. 
     * Por ejemplo: 'en'.
     */
    const HTTP_ACCEPT_LANGUAGE = 'HTTP_ACCEPT_LANGUAGE';
    
    /**
     * Contenido de la cabecera Connection: de la petición actual, si existe. 
     * Por ejemplo: 'Keep-Alive'.
     */
    const HTTP_CONNECTION = 'HTTP_CONNECTION';
    
    /**
     * Contenido de la cabecera Host: de la petición actual, si existe.
     */
    const HTTP_HOST = 'HTTP_HOST';
    
    /**
     * Dirección de la pagina (si la hay) que emplea el agente de usuario para 
     * la pagina actual. Es definido por el agente de usuario. No todos los agentes 
     * de usuarios lo definen y algunos permiten modificar HTTP_REFERER como parte 
     * de su funcionalidad. En resumen, es un valor del que no se puede confiar 
     * realmente.
     */
    const HTTP_REFERER = 'HTTP_REFERER';
    
    /**
     * Contenido de la cabecera User-Agent: de la petición actual, si existe. 
     * Consiste en una cadena que indica el agente de usuario empleado para acceder 
     * a la pagina. Un ejemplo típico es: Mozilla/4.5 [en] (X11; U; Linux 2.2.9 i586). 
     * Entre otras opciones, puede emplear dicho valor con get_browser() para personalizar 
     * el resultado de la salida de la página en función de las capacidades del agente 
     * de usuario empleado.
     */
    const HTTP_USER_AGENT = 'HTTP_USER_AGENT';
    
    /**
     * Ofrece un valor no vacío si el script es pedido mediante el protocolo HTTPS.
     */
    const HTTPS = 'HTTPS';
    
    /**
     * La dirección IP desde la cual está viendo la página actual el usuario.
     */
    const REMOTE_ADDR = 'REMOTE_ADDR';
    
    /**
     * El nombre del host desde el cual está viendo la página actual el usuario. 
     * La obtención inversa del dns está basada en la REMOTE_ADDR del usuario.
     */
    const REMOTE_HOST = 'REMOTE_HOST';
    
    /**
     * El puerto empleado por la máquina del usuario para comunicarse con el 
     * servidor web.
     */
    const REMOTE_PORT = 'REMOTE_PORT';
    
    /**
     * El usuario autenticado.
     */
    const REMOTE_USER = 'REMOTE_USER';
    
    /**
     * El usuario autenticado si la petición es redirigida internamente.
     */
    const REDIRECT_REMOTE_USER = 'REDIRECT_REMOTE_USER';
    
    /**
     * La ruta del script ejecutándose actualmente en forma absoluta.
     */
    const SCRIPT_FILENAME = 'SCRIPT_FILENAME';
    
    /**
     * El valor dado a la directiva SERVER_ADMIN (de Apache) en el archivo de 
     * configuración del servidor web. Si el script se está ejecutando en un host 
     * virtual, el valor dado será el definido para dicho host virtual.
     */
    const SERVER_ADMIN = 'SERVER_ADMIN';
    
    /**
     * El puerto de la máquina del servidor usado por el servidor web para la 
     * comunicación. Para las configuraciones por omisión, el valor será '80'; 
     * el empleo de SSL, por ejemplo, cambiará dicho valor al valor definido 
     * para el puerto HTTP seguro.
     */
    const SERVER_PORT = 'SERVER_PORT';
    
    /**
     * Cadena que contiene la versión del servidor y el nombre del host virtual 
     * que son añadidas a las páginas generadas por el servidor, si esta habilitada 
     * esta funcionalidad.
     */
    const SERVER_SIGNATURE = 'SERVER_SIGNATURE';
    
    /**
     * Ruta de acceso basada en el sistema (no en el directorio raíz de documentos 
     * del servidor) del script actual, después de cualquier mapeo de virtual a real 
     * realizada por el servidor.
     */
    const PATH_TRANSLATED = 'PATH_TRANSLATED';
    
    /**
     * Contiene la ruta del script actual. Esto es de utilidad para las páginas 
     * que necesiten apuntarse a si mismas. La constante __FILE__ contiene la ruta 
     * absoluta y el nombre del archivo actual incluido.
     */
    const SCRIPT_NAME = 'SCRIPT_NAME';
    
    /**
     * La URI que se empleó para acceder a la página. Por ejemplo: '/index.html'.
     */
    const REQUEST_URI = 'REQUEST_URI';
    
    /**
     * Cuando se hace autenticación Digest HTTP, esta variable se establece para 
     * el encabezado 'Authorization' enviado por el cliente (el cual se debe entonces 
     * usar para hacer la validación apropiada).
     */
    const PHP_AUTH_DIGEST = 'PHP_AUTH_DIGEST';
    
    /**
     * Cuando se hace autenticación HTTP, esta variable se establece para el nombre 
     * de usuario provisto por el usuario.
     */
    const PHP_AUTH_USER = 'PHP_AUTH_USER';
    
    /**
     * Cuando se hace autenticación HTTP, esta variable se establece para la clave 
     * provista por el usuario.
     */
    const PHP_AUTH_PW = 'PHP_AUTH_PW';
    
    /**
     * Cuando se realiza la autenticación HTTP, está variable se establece para 
     * el tipo de autenticación.
     */
    const AUTH_TYPE = 'AUTH_TYPE';
    
    /**
     * Contiene cualquier información sobre la ruta proporcionada por el cliente 
     * a continuación del nombre del fichero del script actual pero antecediendo 
     * a la cadena de la petición, si existe. Por ejemplo, si el script actual se 
     * accede a través de la URL http://www.example.com/php/path_info.php/some/stuff?foo=bar, 
     * entonces $_SERVER['PATH_INFO'] contendrá /some/stuff.
     */
    const PATH_INFO = 'PATH_INFO';
    
    /**
     * Versión original de 'PATH_INFO' antes de ser procesado por PHP.
     */
    const ORIG_PATH_INFO = 'ORIG_PATH_INFO';
    
    
}
