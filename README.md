# Projet_STI
Projet STI Application Web

## About Crepe Messaging
A crepe is an eatable support that can usualy be sent by throwing it like a freezbe. Using Crepe messaging allows yout to send those crepes over the internet.
We are sorry not having the time to make it more annimated.

### Starter the docker container

From the project root directory run the 3 following commands.

- `docker run -ti -v "$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018
  `

- `docker exec -u root sti_project service nginx start`

- `docker exec -u root sti_project service php5-fpm start`

- go to `/usr/share/nginx`  and make the database and its directory writable

- `chmod -R 777 databases`



### Check the management part of the application

The default Admin can be used ( username: admin, password: admin ).

#### Or grant a user as administrator 

To be able to check the managing part of our application. An user has to be "administrator". The first registered administrator has to be set manually in the database. 

To do this change the role value in `t_users`  for the user. It should be set to `1` .

