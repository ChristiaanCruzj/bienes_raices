# bienes_raices


##solucionar error 500 
<!-- si quieres que ya permanentemente estén habilitados estos errores, lo cual es realmente muy útil al momento de desarrollar, tienes que ir a tu carpeta de php y abrir el archivo php.ini

Una vez en este archivo, realiza una búsqueda por error_reporting = lo encontraras alrededor de la linea 484 (puede ser mas o menos según la versión de php)

Si la linea se encuentra comentada, es decir esta como ;error_reporting = E_ALL o error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT

Hay que eliminar el ; del inicio para habilitar la linea y dejarla exactamente como error_reporting = E_ALL

Luego unas lineas mas abajo encontraras display_errors ojo si buscas como tal esta linea, te llevara a un bloque que esta mas arriba, ese solo son instrucciones debes darle buscar de nuevo para que te lleve a la linea que necesitamos, misma que se encuentra varias lineas mas abajo del primer string que buscamos.

Este lo mismo, si esta comentada con ; hay que removerlo y su su valor es Off debes cambiarlo a On con la O mayúscula.

Y si continuas un poco mas abajo, también encontraras display_startup_errors hay que hacer exactamente lo mismo, remover el ; si es que lo tiene y dejar su valor en On -->