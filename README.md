# solid

Este es el proyecto BACKEND

No se utilizó ningun framework, se realizo un pequeño marco de trabajo, con lo solicitado SOLID.

Tanto el query builder como el registro de rutas de los api rest y la gestion de controladores estan programados desde cero.

El proyecto se comenzó el dia 9 de agosto del 2019, con un total de 37 horas invertidas tanto en back como en front.

para instalar el back.

es necesario crear un virtual host con el nombre "solid" se deje el .conf 

<VirtualHost *:80>
  ServerName solid
  ServerAlias solid
  DocumentRoot "${INSTALL_DIR}/www/solid/public"
  <Directory "${INSTALL_DIR}/www/solid/public">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require local
  </Directory>
</VirtualHost>


agregar al archivo "host" de windows o linux la url del servidor virutal que se acaba de agregar.

asi como montar la base de datos en maria db que se encuentra en la carpeta:

db -> script.sql

la base de datos debera llamarse "examen", o en su defecto modificar el archivo:

config->database->connections.json con los parametros solicitados.

