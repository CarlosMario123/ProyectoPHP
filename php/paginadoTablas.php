<?php
function paginador_tablas($pagina, $Npaginas, $url, $botones){
    // Se inicia la estructura de navegación usando Flexbox para centrar los elementos
    $tabla = '<nav class="flex items-center justify-center" role="navigation" aria-label="pagination">';

    // Manejo del botón "Anterior" y la lista de números de página
    if($pagina <= 1){
        // Si la página actual es la primera o menos, se muestra el botón "Anterior" deshabilitado
        $tabla .= '<a class="px-3 py-2 text-gray-600 bg-gray-300 rounded-l cursor-not-allowed" aria-disabled="true">Anterior</a>';
        // Se inicia la lista de números de página
        $tabla .= '<ul class="flex">';
    }else{
        // Si la página actual es mayor que 1, se muestra el botón "Anterior" y se agrega la primera página como enlace
        $tabla .= '<a class="px-3 py-2 text-white bg-blue-500 rounded-l hover:bg-blue-600" href="'.$url.($pagina-1).'">Anterior</a>';
        $tabla .= '<ul class="flex">';
        $tabla .= '<li><a class="px-3 py-2 text-blue-500 bg-white rounded hover:bg-blue-100" href="'.$url.'1">1</a></li>';
        $tabla .= '<li><span class="px-3 py-2">...</span></li>';
    }

    // Generación de números de página para el paginador
    $ci = 0;
    for($i = $pagina; $i <= $Npaginas; $i++){
        if($ci >= $botones){
            break;
        }
        if($pagina == $i){
            // Si la página actual coincide con el número en la iteración, se muestra como página actual
            $tabla .= '<li><a class="px-3 py-2 text-white bg-blue-500 rounded cursor-not-allowed">'.$i.'</a></li>';
        }else{
            // Si no coincide, se muestra como enlace a la página respectiva
            $tabla .= '<li><a class="px-3 py-2 text-blue-500 bg-white rounded hover:bg-blue-100" href="'.$url.$i.'">'.$i.'</a></li>';
        }
        $ci++;
    }

    // Manejo del botón "Siguiente" y finalización de la estructura de navegación
    if($pagina == $Npaginas){
        // Si la página actual es la última, se muestra el botón "Siguiente" deshabilitado
        $tabla .= '</ul>';
        $tabla .= '<a class="px-3 py-2 text-gray-600 bg-gray-300 rounded-r cursor-not-allowed" aria-disabled="true">Siguiente</a>';
    }else{
        // Si no es la última página, se agrega el último número de página como enlace y se muestra el botón "Siguiente"
        $tabla .= '<li><span class="px-3 py-2">...</span></li>';
        $tabla .= '<li><a class="px-3 py-2 text-blue-500 bg-white rounded hover:bg-blue-100" href="'.$url.$Npaginas.'">'.$Npaginas.'</a></li>';
        $tabla .= '</ul>';
        $tabla .= '<a class="px-3 py-2 text-white bg-blue-500 rounded-r hover:bg-blue-600" href="'.$url.($pagina+1).'">Siguiente</a>';
    }

    // Se cierra la estructura de navegación
    $tabla .= '</nav>';

    // Se devuelve la estructura completa del paginador
    return $tabla;
}

?>