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

Réussit par Joel en injectant dans l'input de l'username la requete SQL: 

**A3 -Brute forcable login form**

**A4 - No limit of max login attempts**

**A5 - **



TODO:
Burp Suite:
-> faire un scan du login


###Menaces
 
###Contre mesures

Premierement faire en sorte que les noms des champs credentials dans le code php ne soient pas prédictibles -> (username et password).
Il faudrait pas exemple les hasher au prealable ou 