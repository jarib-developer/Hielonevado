<?php

if (!function_exists('MakeRouteAndValidate')) {
    /**
     * Crea una ruta dentro de la carpeta public/ si no existe.
     *
     * @param string $rutaRelativa Ej: 'uploads/Images/Avatars/Landlords/'
     * @param int $permisos Permisos tipo 0755 o 0775
     * @return string Ruta absoluta completa
     */
    function MakeRouteAndValidate(string $route, int $permisos = 0775)
    {
        if (!is_dir($route)) {
            mkdir($route, $permisos, true);
        }
    }
}