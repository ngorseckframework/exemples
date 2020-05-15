Ce projet gère des sessions des utilisateurs avec une partie administration de la plateforme

Vous devez suivre ces instructions pour exécuter le projet:

1. Tapez la commande: composer install

2. Créer une base de données mysql nommée coursenlignesm

3. Tapez cette comme pour générer la base de données 

	- Si vous avez un système Linux ou Mac : vendor/bin/doctrine orm:schema-tool:update --force --dump-sql

	- Si vous êtes sous windows : vendor\bin\doctrine orm:schema-tool:update --force --dump-sql