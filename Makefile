install:
	docker-compose up -d
	docker-compose exec architect.de bash -c "cd /app/shop && composer install"
