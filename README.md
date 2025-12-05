# TimoHSymfoEval
MonProjet Symfony
Description

    MonProjet est une application Symfony de gestion d’articles.
    Fonctionnalités principales :

    Affichage de tous les articles

    Création, édition et suppression d’articles pour les admins

    Système d’authentification (login / logout / inscription)

    Recherche d’articles

    Page d’accueil avec liste des derniers articles

Prérequis

    PHP ≥ 8.1

    Composer

    SQLite (ou autre base de données, à adapter)

    Node.js + npm (pour les assets si nécessaire)

    Installation

    Cloner le projet

    git clone <https://github.com/Timotheehau/TimoHSymfoEval>
    cd <TimoHSymfoEval>


Installer les dépendances PHP

    composer install


Configurer l’environnement

    Copier le fichier .env :

    cp .env .env.local


Modifier la variable DATABASE_URL si nécessaire (ici SQLite) :

    DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"


Créer la base de données et les tables

    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate

Consulter la base de données...

    sqlite3 var/data.db

...et les tables

    .tables

Charger les fixtures (exemple d’utilisateur admin)

    php bin/console doctrine:fixtures:load


L’utilisateur par défaut :

    Email : titi.hauser@gmail.com

    Mot de passe : motdepasse123

    Rôle : ROLE_ADMIN

Installer les assets (si nécessaire, ici pas utilisés)

    npm install
    npm run dev


Lancer le serveur de développement

    symfony server


    Accéder à l’application via : http://localhost:8000

Fonctionnalités

    Page d’accueil avec les derniers articles

    Liste complète des articles

    Création / édition / suppression des articles (réservé aux admins)

    Recherche d’articles

    Système d’authentification : login, logout, inscription

Structure du projet

    src/Controller : Contrôleurs

    src/Entity : Entités Doctrine

    src/Form : Formulaires Symfony

    templates/ : Templates Twig

    migrations/ : Migrations Doctrine

    var/data.db : Base SQLite

Notes

    Pour ajouter un nouvel utilisateur : utiliser le formulaire d’inscription.

    Pour modifier le rôle d’un utilisateur : via la base de données directement (ou créer une interface d’admin).

    Le mot de passe est hashé automatiquement grâce au UserPasswordHasherInterface.