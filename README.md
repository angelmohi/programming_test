## Programming test

Para descargar el proyecto puedes hacerlo desde mi repositorio de GitHub:

https://github.com/angelmohi/programming_test

Una vez descargado el proyecto se debe de configurar el fichero .env para poder ejecutar las migraciones y seeders usando el siguiente comando:

php artisan migrate:fresh --seed

Al ejecutarlas se crea automáticamente un usuario admin cuyo correo es "admin@test.com" y password "admin".

Para el envío del email con la invitación para el registro he usado la herramienta Mailtrap, la cual hay que configurar también en el fichero .env.
