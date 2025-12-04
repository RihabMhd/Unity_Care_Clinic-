# 🏥 Unity Care Clinic – Backend Management System

Unity Care Clinic est un **système complet de gestion backend pour établissement médical**, développé en **PHP 8.5 procédural** avec **MySQLi**.
Le projet fournit une interface d’administration moderne permettant de gérer les **patients**, **médecins**, **départements**, tout en offrant un **tableau de bord statistique dynamique**.

---

## ✨ Fonctionnalités Principales

### 🔹 Gestion des Entités

* **Patients** : CRUD complet (Créer, Lire, Modifier, Supprimer)
* **Médecins** : gestion complète avec liaison aux départements
* **Départements** : administration des services médicaux

### 📊 Tableau de Bord Dynamique

* Statistiques en temps réel (patients, médecins, départements)
* Graphiques interactifs via **Chart.js**
* Indicateurs par département
* Vue d’ensemble centralisée

### 🌍 Internationalisation (i18n)

* Langues supportées : **Français**, **Anglais**, **Espagnol**
* Changement de langue instantané
* Fichiers de traduction organisés dans `/lang`

### ✨ Fonctionnalités Bonus

* Navigation fluide via **AJAX**
* Formulaires en **modals**
* Graphiques avancés
* Code structuré et extensible

---

## 🛠 Technologies Utilisées

* **Backend** : PHP 8.5 (procédural)
* **Base de données** : MySQL / MySQLi
* **Frontend** : HTML5, CSS3, JavaScript
* **UI Framework** : Bootstrap
* **Graphiques** : Chart.js

---

## 📦 Prérequis

* PHP **8.5+**
* MySQL **5.7+**
* Serveur web (Apache / Nginx)
* Extension **MySQLi** activée


## 📁 Structure du Projet

```
unity-care-clinic/
├── config/
│   ├── database.php
│   └── i18n.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── functions.php
├── modules/
│   ├── patients/
│   ├── doctors/
│   └── departments/
├── dashboard/
│   └── index.php
├── lang/
│   ├── fr.php
│   ├── en.php
│   └── es.php
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
├── database/
│   └── schema.sql
└── index.php
```

---

## 🎯 User Stories

| ID   | Description                        | Priorité |
| ---- | ---------------------------------- | -------- |
| US01 | CRUD complet sur les patients      | Haute    |
| US02 | Gestion des départements           | Haute    |
| US03 | Gestion des médecins + association | Haute    |
| US04 | Tableau de bord statistique        | Haute    |
| US05 | Internationalisation (i18n)        | Moyenne  |
| US06 | AJAX pour une navigation fluide    | Basse    |









