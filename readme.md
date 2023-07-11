# Clasificador de Perros por m.lopez(mlf.481990@gmail.com)

### Stack: 
    - Laravel 5.3
    - Vuejs 2

### Condiciones y caracteristicas adiciones
Para poder ejecutarse dicho proyecto es necesario una versión de PHP entre **5.6** y **7.1**, tener instalado tambien MySql 8.0 o MariaDB.

En caso de tener MySql instalado en su instancia, se ha añadido a la configuración de la instancia de DB la siguiente parametrización:
```php
'modes'       => [
  'ONLY_FULL_GROUP_BY',
  'STRICT_TRANS_TABLES',
  'NO_ZERO_IN_DATE',
  'NO_ZERO_DATE',
  'ERROR_FOR_DIVISION_BY_ZERO',
  'NO_ENGINE_SUBSTITUTION',
],
```
Para que no genere error tanto al levantar la base de datos como al interactuar con ella.

**Para la ejecución con npm se ha añadido `NODE_OPTIONS=--openssl-legacy-provider` al principio de los comandos principales, 
en caso de no ser necesario para el proceso por que se utilice una versión anterior de Node retirese sin problema.**

## Instalación
### Pasos

  - `git clone https://github.com/m-lopez-f/clasificador.git` o descargar el  [ZIP](https://github.com/m-lopez-f/clasificador/archive/refs/heads/master.zip)
  - `composer install`

El proyecto ya se ha subido compilado, aún así están los fuentes para sentirse uno libre de compilarlo libremente. En ese caso se necesitará el siguiente comando:
  - `npm i`
  - `npm run dev` o `npm run prod`

Una vez terminados estos pasos necesitamos generar la DB por lo que ejecutaremos los siguientes comandos:
  - `mysql -u <user_mysql> -p` e introducir la contraseña
  - `CREATE DATABASE <nombre_DB>`
  - ir al fichero .env y sustituir los siguientes parametros, por los parametros de nuestra conexión y parametros correspondientes:
    - ```
      DB_CONNECTION=mysql
      DB_HOST=localhost
      DB_PORT=3306
      DB_DATABASE=homestead
      DB_USERNAME=homestead
      DB_PASSWORD=secret
      ```

Terminado esos cambios ejecutaremos `php artisan migrate` para insertar las tablas en nuestra DB.
Para terminar realizaremos un link de la carpeta storage en public con el siguiente comando `php artisan storage:link`

# Ejecución

Una vez instalado y completados todos los pasos estamos ya con los nervios de probar la web. Aquí tenemos dos opciones ejecutar el 
servicio que nos ofrece laravel de levantar un servidor o preparar el entorno para que sea ejecutado con nginx o apache.

1. Laravel server
   - ejecutaremos `php artisan serve` y la url que nos indique será donde podremos ver la web
2. Nginx/Apache: en este caso os remito a la documentación [oficial](https://laravel.com/docs/5.3/installation#web-server-configuration)

      
  
