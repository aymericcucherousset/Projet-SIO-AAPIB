# Projet-SIO-AAPIB
 Projet SIO AAPIB BTS SIO 1ère année, Aymeric Antoine

## Objectifs

- [x] Mission 1: Windows Serveur
- [x] Mission 2: Partage des ressources
- [x] Mission 3: Gestion des pannes
- [ ] Mission 4: Gestion du parc
- [ ] Mission 5: Mise en place d'un cloud
- [ ] Mission 6: Création d'un site vitrine
- [ ] Mission 7: Création d'un site intranet
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
 

## Taches :

  - Définir des IP static pour les serveurs
  - Ajouter les utilisateurs sur l'intranet
  - Ajouter nextcloud et la lisaison LDAP

  - Site vitrine sous WP
  - Serveur DNS

  - GNS 3
  - Certficat avec authorité de certficat 