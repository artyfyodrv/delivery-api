build:
	docker compose build
up:
	docker compose up -d
up-l:
	docker compose up
down:
	docker compose down
stop:
	docker compose stop
start:
	docker compose start
vendor:
	docker compose exec php-delivery bash -c "composer install"
install: up vendor
	@cp .env.example .env && \
	docker compose exec php-delivery bash -c "php artisan key:generate"
migrate:
	docker compose exec php-delivery bash -c "php artisan migrate"

