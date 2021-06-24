# Projet-SIO-AAPIB
 Projet SIO AAPIB BTS SIO 1ère année, Aymeric Antoine

## Expérimentations

- Proxmox : 
      Nous souhaitions avoir un serveur de virtualisation dans le but de se rapprocher d'un envirnement de production. Nous avions le choix entre Proxmox et Vmware, nous avons fait le choix de tester Proxmox, car il s'agit d'une solution open-source et le principe de conteneur LXC nous intéréssaient nottement pour l'optimisation de la consomation des ressources. Malheureusement nous n'avions pas serveur physique alors nous avons du passer par de la virtualisation imbriquée. Une fois l'installation terminée, nous nous sommes rendu compte que notre materiel physique ne pouvait pas supporter ça. Nous nous sommes alors rediriger vers Docker pour l'utilisation des conteuneurs et vers VirtualBox pour les machines virtuelles.
      
-  Docker :
      Dans l'optique d'utiliser Docker pour la légèreté qu'offre les conteneurs, mais aussi pour garder le même environement en Développement qu'en production, dans le but d'optimiser cette phase de transition. Nous avons d'abord tester cette solution, mais très vite nous avons rencontrer un soucis qui était la persistance des données dans les conteuneurs. Ayant déjà perdu du temps dans la recherche d'une solution à notre problème de virtualisation imbriquée, nous avons fait le choix de partir sur VirtualBox et d'utiliser des machines virtuelles.
      
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
