all:
	@-exit 1

test:
	vendor/phpunit/phpunit/phpunit --testsuite Tests
