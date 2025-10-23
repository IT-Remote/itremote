# IT Remote Link (GLPI 10/11)

## Ce que fait le plugin
Crée automatiquement un bouton nommé *IT Remote* avec un **Lien externe**,
associé aux **Ordinateurs**, avec l’URL :
`https://control.itremote.com/remote/openaccess?devicename={{ NAME }}` (balises Twig GLPI 11).

## Installation
1) Copier le dossier `itremote` dans `<GLPI_ROOT>/plugins/`.
2) Aller dans **Configuration > Plugins** puis **Installer** et **Activer**.
3) Un bouton **IT Remote** est injecté dans la fiche du premier onglet Ordinateur.