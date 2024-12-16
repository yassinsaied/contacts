# **Gestionnaire de Contacts Dynamique**

Une application web simple et moderne permettant de gérer une liste de contacts avec des fonctionnalités interactives, une interface responsive, et une gestion automatique de la base de données au premier lancement.

---

## **Fonctionnalités Principales**

1. **Affichage dynamique des contacts :**

   -  Liste récupérée depuis une base de données MySQL.
   -  Affichage des informations de base pour chaque contact (nom, email, téléphone, notes).

2. **Recherche en temps réel :**

   -  Filtrage dynamique des contacts via une barre de recherche.
   -  Icône d'annulation visible lors de la saisie pour réinitialiser la recherche.

3. **Affichage des détails d'un contact :**

   -  Un popup affiche les informations détaillées sur un contact.

4. **Suppression avec confirmation :**

   -  Un popup de confirmation personnalisé permet de supprimer un contact.

5. **Gestion automatique de la base de données :**

   -  Au premier lancement, la base de données est créée et peuplée automatiquement avec des données initiales si elle n'existe pas.

6. **Interface utilisateur moderne et responsive :**
   -  Design optimisé pour un usage sur desktop, tablette et mobile.

---

## **Technologies Utilisées**

-  **Backend :** PHP 7, MySQL.
-  **Frontend :** HTML5, CSS3, JavaScript (jQuery).
-  **Bibliothèques :**
   -  **phpQuery** : Manipulation de templates HTML côté serveur.
   -  **jQuery** : Gestion des interactions côté client.
   -  **Font Awesome** ou **Material Icons** : Icônes modernes.

---

## **Installation**

### **1. Prérequis**

-  Serveur local : XAMPP, WAMP ou tout autre serveur compatible PHP 7.
-  Base de données MySQL.

### **2. Étapes d'installation**

1. Décompressez le fichier ZIP de projet.
2. Placez le fichier dans le serveur .
3. Assurez-vous que la base de données MySQL est configurée.
4. Ouvrez le fichier `src/dbSetup.php` et configurez vos paramètres de connexion :
   ```php
   $host = 'localhost';
   $dbname = 'gestion_contact';
   $username = 'root';
   $password = '';
   ```
