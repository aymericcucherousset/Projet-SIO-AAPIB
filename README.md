# Projet-SIO-AAPIB
 Projet SIO AAPIB BTS SIO 1ère année, Aymeric Antoine
 
 ## Répartitions des taches (Gantt Project)
 
![alt text](https://github.com/aymericcucherousset/Projet-SIO-AAPIB/blob/main/GANT.png)

La répartitions des taches à été construite de la manière suivante : 

- En bleu les taches de Réseaux
- En vert les taches de Développement
- En rose les réunions de mises en commun 

Nous avons décider de nous partager certaines taches et d'en faire d'autres ensemble. 

Nous nous sommes renseigné ensemble pour l'installation et l'utilisation de Proxmox. Ce qui nous a fait prendre une semaine de retard par rapport à notre Gant.

Antoine c'est chargé de faire l'installation et les paramètrages du Windows Serveur pendant que Aymeric à commencé de dévelloper l'intranet.

Suite à la première mission réalisée, avec une semaine de retard. Nous nous sommes renseignés pour utiliser Docker (pendant 2 semaines), sans résultats concluants.  

Nous avons installer et configurer le serveur d'impression avec l'ajout des imprimantes en 3 semaines, c'est à ce moment moment que le déclic retetenti, nous avons mis les bouchées doubles.

Nous nous sommes fixé d'avantage de travail en groupe, pour s'entraider et être plus éfficaces.
On c'est occuper d'installer Glpi, Nextcloud et Zabbix ensemble.

Aymeric a fini de développer l'intranet avec quelques semaines de retard.

Nous avons installer et configurer le Reverse Proxy ensemble.

La dernière semaine nous avons fais le site Web vitrine, la cartographie du réseau, préparation de sécurité (Sans la mise en place) et préparer les procédures.

## Expérimentations

- Proxmox : 
      Nous souhaitions avoir un serveur de virtualisation dans le but de se rapprocher d'un environnement de production. Nous avions le choix entre Proxmox et Vmware, nous avons fait le choix de tester Proxmox, car il s'agit d'une solution open-source et le principe de conteneur LXC nous intéressait nottamment pour l'optimisation de la consommation des ressources. Malheureusement nous n'avions pas de serveur physique, alors nous avons du passer par de la virtualisation imbriquée. Une fois l'installation terminée, nous nous sommes rendu compte que notre matériel physique ne pouvait pas supporter cela. Nous nous sommes alors redirigé vers Docker pour l'utilisation des conteneurs et vers VirtualBox pour les machines virtuelles.
      
-  Docker :
      Dans l'optique d'utiliser Docker pour la légèreté qu'offre les conteneurs, mais aussi pour garder le même environnement en Développement qu'en production, dans le but d'optimiser cette phase de transition. Nous avons d'abord testé cette solution, mais très vite nous avons rencontré un soucis qui était la persistance des données dans les conteneurs. Ayant déjà pris un certains temps de projet dans la recherche d'une solution à notre problème de virtualisation imbriquée, nous avons fait le choix de partir sur VirtualBox et d'utiliser des machines virtuelles.
      
## Objectifs

- [x] Mission 1: Windows Serveur
- [x] Mission 2: Partage des ressources
- [x] Mission 3: Gestion des pannes
- [ ] Mission 4: Gestion du parc
- [ ] Mission 5: Mise en place d'un cloud
- [x] Mission 6: Création d'un site vitrine
- [x] Mission 7: Création d'un site intranet
- [ ] Mission 8: Mise en place de sécurités

## Utilisateurs
  # WEB:
    - Debian : sio et root / projetsio
    
    - vitrine : 
      - sio/projetsio (compte wp)
      - root / projetsio (bdd)
      
    - intranet:
      - intranetuser / intranetpw (bdd)
      - root / projetsio (bdd)
      
 # Nextcloud:
    - Debian : sio et root / projetsio
    
    - bdd : 
      - root / projetsio 
      - nextclouduser / projetsio
      
    - Nextcloud:
      - sio / projetsio


## DNS

  # WEB 
  - [intranet.local](http://intranet.local) -> Debian-projet-reverse-proxy -> Debian-projet-web
  - [vitrine.local](http://vitrine.local)   -> Debian-projet-reverse-proxy -> Debian-projet-web
  - [aapib.local](http://aapib.local)       -> Debian-projet-reverse-proxy -> Debian-projet-web
  
  # Outils 
  - [zabbix.intranet.local](http://zabbix.intranet.local)       -> Debian-projet-reverse-proxy -> Debian-projet-zabbix
  - [glpi.intranet.local](http://glpi.intranet.local)           -> Debian-projet-reverse-proxy -> Debian-projet-glpi
  - [nextcloud.intranet.local](http://nextcloud.intranet.local) -> Debian-projet-reverse-proxy -> Debian-projet-nextcloud


## IP [10.0.2.113 - 10.0.2.253] (Gateway 10.0.2.249-254)

  - AD            : 10.0.2.248

  - WEB           : 10.0.2.247
  - REVERSE-Proxy : 10.0.2.246
  - GLPI          : 10.0.2.245
  - Zabbix        : 10.0.2.244
  - Nextcloud     : 10.0.2.243
 

## Taches Restantes :

  - Nextcloud (Lisaison LDAP)
  - Zabbix    (Lisaison LDAP)
  - GLPI      (OCS)

  - Serveur DNS

  - Cisco
  - Certficat avec authorité de certfication
