# Plugin IT Remote (GLPI 9 à 12)

La solution logicielle « IT Remote » est développée par un éditeur français (fondé en 2020).
IT Remote est une [solution web tout-en-un de téléassistance et de contrôle à distance](https://itremote.com).
Elle est conçue pour les services informatiques d'entreprise, les prestataires de services et les administrateurs systèmes.

Ce plugin GLPI permet d'ajouter un accès direct en prise de main à distance avec **IT Remote** sur chaque fiche **Ordinateur** :
- un bouton *IT Remote* à gauche du bouton *Actions* ;
- un onglet *IT Remote* avec le même lien.

Le lien ouvre `https://control.itremote.com/remote/openaccess?devicename=<nom de l'ordinateur>`.
Le nom de l'appareil dans IT Remote doit donc correspondre au nom de l'ordinateur dans GLPI.

## Installation
1) Copier le dossier `itremote` dans `<GLPI_ROOT>/plugins/`
   (le dossier doit s'appeler exactement `itremote`).
2) **Configuration > Plugins** : **Installer** puis **Activer**.

Les scripts du plugin ne sont chargés que pour les sessions authentifiées.
