vendor:
	@composer install

update: vendor
	@composer update

autoload: vendor
	@composer dump-autoload -o

server: vendor
	cd web && ICANBOOGIE_INSTANCE=dev php -S localhost:8060 index.php

optimize: vendor
	@composer dump-autoload -o
	ICANBOOGIE_INSTANCE=dev icanboogie optimize
