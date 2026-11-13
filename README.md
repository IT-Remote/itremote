# IT Remote (GLPI 9 à 12)

Plugin GLPI qui ajoute un accès **IT Remote** aux fiches **Ordinateurs** :
- un bouton *IT Remote* à gauche du bouton *Actions* ;
- un onglet *IT Remote* avec le même lien.

Le lien ouvre `https://control.itremote.com/remote/openaccess?devicename=<nom de l'ordinateur>`.
Le nom de l'appareil dans IT Remote doit donc correspondre au nom de l'ordinateur dans GLPI.

## Installation
1) Copier le dossier `itremote` dans `<GLPI_ROOT>/plugins/`
   (le dossier doit s'appeler exactement `itremote`).
2) **Configuration > Plugins** : **Installer** puis **Activer**.

Les scripts du plugin ne sont chargés que pour les sessions authentifiées.
