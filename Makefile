install:
	docker-compose up -d
	docker-compose exec im.shop bash -c "cd /app/shop && composer install"
	docker-compose exec im.shop bash -c "cd /app/shop && php artisan migrate:fresh --seed"
