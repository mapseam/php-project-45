install:
	composer install

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-even-old:
	./bin/brain-even-old

brain-calc:
	./bin/brain-calc

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

