

Vous devez suivre ces instructions pour exécuter le projet:
1. Installer composer

2. Tapez la commande: composer install

3. Créer une base de données nommée heriagephp


4. Tapez cette comme pour générer la base de données si vous avez un système Linux ou Mac : vendor/bin/doctrine orm:schema-tool:update --force --dump-sql
Si vous êtes sous windows : vendor\bin\doctrine orm:schema-tool:update --force --dump-sql