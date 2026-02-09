# 🏅 Tableau des Médailles - JO
> Ce projet est une application web légère en PHP permettant d'afficher en temps réel le classement des médailles des Jeux Olympiques à partir d'une API.
![Aperçu de l'interface](Capture%20d’écran%202026-02-09%20à%2013.59.33.png)

## 🚀 Fonctionnalités
Lecture Dynamique : Les données sont extraites directement du fichier Resultats.csv.

Mise en Valeur : Une fonction spécifique permet de surligner automatiquement la ligne de la France dans le tableau.

Nettoyage de Données : Utilisation d'un script "Dos De Chameau" (ddc.php) pour transformer les noms de pays en noms de fichiers propres pour l'affichage des drapeaux.

Auto-actualisation : La page se recharge automatiquement toutes les 10 minutes pour garantir la fraîcheur des données.

Design Responsive : Adapté aux mobiles et tablettes.

## 📂 Structure du projet

```text
.
├── index.php              # Fichier principal (logique d'affichage et HTML)
├── datas/
│   └── Resultats.csv      # Source de données (Rang, Pays, Or, Argent, Bronze, Total)
├── includes/
│   ├── ddc.php            # Formate les noms de pays pour les icônes (CamelCase)
│   └── singPluriel.php    # Gère l'accord singulier/pluriel des points
├── css/
│   ├── style.css          # Feuilles de style (design et tableau)
│   └── images/            # Dossier contenant les drapeaux et visuels
```
## 🛠️ Installation
1. Clonez le dépôt sur votre serveur local (WAMP, MAMP, XAMPP) ou votre serveur web :
git clone https://github.com/Superchick-87/Tableau-des-medailles-Jo-hiver-2026.git

2. Assurez-vous que PHP est installé (version 7.0 ou supérieure recommandée).

3. Placez vos données à jour dans datas/Resultats.csv en respectant le format suivant :
Rang,Nations,Or,Argent,Bronze,Total
1,Norvège,3,1,2,6

## 📝 Licence
Ce projet est destiné à un usage informatif.