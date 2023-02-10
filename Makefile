###      ###
### INIT ###
###      ###
init:
	make init-be
	make init-fe
init-be:
	make cache-clear
	make composer-install
	make database-reset
init-fe:
	make yarn


###         ###
### BACKEND ###
###         ###
composer-install:
	composer install
composer-update:
	composer update
database-reset:
	php bin/console doctrine:database:drop --force --if-exists
	php bin/console doctrine:database:create
	make migrations-migrate
migrations-diff:
	php bin/console doctrine:migrations:diff --no-interaction
migrations-migrate:
	php bin/console doctrine:migrations:migrate --no-interaction
cache-clear:
	rm -rf var/cache var/log
cache-warmup:
	php bin/console cache:warmup


###          ###
### FRONTEND ###
###          ###
yarn-install:
	yarn install
yarn-build:
	yarn build
	yarn encore dev
yarn:
	make yarn-install
	make yarn-build

###               ###
### QUALITY TOOLS ###
###               ###
pre-commit:
	composer code-check
	yarn lint


###           ###
### SHORTCUTS ###
###           ###
ci:
	make composer-install
dr:
	make database-reset
pc:
	make pre-commit
cc:
	make cache-clear
cw:
	make cache-warmup
diff:
	make migrations-diff
migrate:
	make migrations-migrate
