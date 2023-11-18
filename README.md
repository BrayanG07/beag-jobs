<div align="center">
  <h1>BeagJobs</h1>
</div>

## Installation
1. Crear el archivo .env y llenar las propiedades necesarias, ejecuta el siguiente comando:
```
cp .env.example .env
```

3. Ejecutar las migraciones con el siguiente comando:
``` bash
# Si aun no tienes creada la base de datos te aparecera un mensaje como el siguiente: Would you like to create it? (yes/no). ingresa: yes
php artisan migrate
```

4. Ejecutar el seed para configurar el proyecto con los datos requeridos para su correcto funcionamiento:
```
php artisan db:seed
```

5. Ejecutar el proyecto:
```
php artisan serve
npm run dev
```

6. Al ejecutar el comando ```php artisan serve``` obtendra una URL como la siguiente:
``` bash
# Example
Server running on [http://127.0.0.1:8000].
```

7. Ingrese a la url ```http://127.0.0.1:8000``` con su navegador de preferencia y disfrute del sistema.


## Author
Ing. Brayan Alvarez
