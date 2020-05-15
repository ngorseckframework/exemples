Ce projet gère des villes et des pays et donc un crud est préparé pour chaque entite

Vous devez suivre ces instructions pour exécuter le projet:
1. Installer composer

2. Tapez la commande: composer install

3. Créer une base de données mysql

4. Modifier les paramètre du fichier database.php

5. Tapez cette comme pour générer la base de données si vous avez un système Linux ou Mac : vendor/bin/doctrine orm:schema-tool:update --force --dump-sql
Si vous êtes sous windows : vendor\bin\doctrine orm:schema-tool:update --force --dump-sql