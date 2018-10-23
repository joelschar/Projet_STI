# Projet_STI
Projet STI Application Web

## about Crepe Messaging
A crepe is an eatable support that can usualy be sent by throwing it like a freezbe. Using Crepe messaging allows yout to send those crepes over the internet.
We are sorry to having the time to make it more annimated.


### starter le container docker pour le dev

`docker run -ti -v "$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018
`

`docker exec -u root sti_project service nginx start`

`docker exec -u root sti_project service php5-fpm start`

`docker exec -it sti_project /bin/bash`

aller dans /usr/share/nginx

`chmod -R 777 databases`

infos sqlite: https://www.tutorialspoint.com/sqlite/sqlite_php.htm
