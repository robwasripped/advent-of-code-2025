FROM php:8.4-alpine AS common

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /app

RUN --mount=type=bind,source=composer.json,target=composer.json \
    --mount=type=bind,source=composer.lock,target=composer.lock \
    composer install --optimize-autoloader

COPY . /app

FROM common AS test

ENTRYPOINT ["php", "/app/bin/phpunit"]

FROM common AS main

ENTRYPOINT ["php", "/app/bin/console"]

CMD ["help"]