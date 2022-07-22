<?php
use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();

echo getenv('APP_ENV');
// dev
echo getenv('DATABASE_DNS');
// mysql:host=localhost;dbname=test;