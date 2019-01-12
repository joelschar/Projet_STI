#Projet " STI" Part 2

Authors: Koubaa Walid & Schar Joel
Date: 15/01/2019

##Introduction au site web

####Crepe Messaging, c'est quoi ?

A crepe is an eatable support that can usualy be sent by throwing it like a freezbe. Using Crepe messaging allows yout to send those crepes over the internet.
We are sorry not having the time to make it more animated.

##Scenario d'attaques

**A1 - Attaque avec modification de l'URL.**

Nous avons essayé de nous connecter directement à la manière d'un GET en spécifiant les credentials directement depuis l'url.
Malheuresement cela na pas fonctionné: une protection implémenté ()
![alt](img/1.png)


**A2 - Injection SQL depuis le formulaire (form)**

Réussit par Joel en injectant dans l'input de l'username la requete SQL: '1 

admin 1=1''

**A3 -Brute forcable login form**


		
-> Avec Burp on configure le proxy de notre browser Firefox et spécifie l'adresse et le port de notre login Crepe Messaging (127.0.0.1:8080).
Ensuite une fois les configurations terminées, on appuieon teste  

![alt](img/2.png)

Grace a cela nous pouvons brute forcer tout les mots de passe pour tout les logins que nous spécifions dans la liste de payloads. Pour faciliter la chose et rendre le processus automatisé on peut choisir une liste de mot de passe parmi celle proposées par Burp ou bien choisir un fichier de mot de passe (rockyou.txt par exemple).

-> le plus interessant est que nous pouvons choisir des options qui permettront de découvrir quels sont les username existant en fonction du message d'erreur retourné par une mauvaise saisie de credentials.
(si on détecte dans la page le message d'erreur password incorrect, cela veut dire que l'username saisi existe dans la DB).

![alt](img/3.png)

Ainsi en fonction de ce message on peux orienter notre attaque sur le username visé et tester pour celui ci tout les mot de passes a notre disposition. Une fois le login "success", nous avons la bonne combinaison username/password.

AU final nous arrivons a nous connecter avec les bons credentials.


**A4 - No limit of max login attempts**


**A5 Id des messages directement accessibles- **

Success !

-> on peut lire les messages de tout le monde
Il suffit de se loguer avec n'importe quel utilisateur et ensuite on peut 
avoir accès aux messages de tout le monde.

ex: *http://localhost:8080/mail.php?viewMail&id=32*

on peut aussi les supprimer
Une fois connecté avec un utilisateur

1.On envoie un mail a l'administrateur

![alt](img/4.png)


2.On arrive a lire les messages de l'administrateur (sachant que les mails ont un id définit à partir d'un compteur qui s'incremente on peut deviner facilement son id) et on peu même les supprimer.
Par contre il faut connaitre l'id du message mais vu que ceux ci s' incrémentent on peux les deviner 

![alt](img/5.png)



-> mais on peut pas usurper l'identité de l'individu.

**A6 Acces aux informations des utilisateur visibles suelement par l'administrateur**

Failure

http://localhost:8080/admin.php?user_id=7

TODO:
Burp Suite:
-> faire un scan du login


###Menaces
 
 -> Pas de nombre de login max bloquant l'accès au compte au bout de 3 essais pour une durée limitée
 
###Contre mesures

1. -> Faire ne sorte que les messages ne soit pas incrementé mais que leur id soit hasher avec une fonction de hashage(meme avec md5) afin qu'ils ne soient pas prédictibles.
 **Solution** (hasher les id des messages dans le code php)

2. -> LImiter le nombre d'essais consécutifs durant une période et bloquer des nouvelles tentatives pendant un certain laps de temps (30 min)
 **Solution** avec un timeout dans le code php.



