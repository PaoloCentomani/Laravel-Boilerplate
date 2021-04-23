<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'example.com');

// Project repository
set('repository', 'git@github.com:PaoloCentomani/Laravel-Boilerplate.git');

// [Optional] Allocate tty for git clone. Default value is false
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

// Additional configuration
add('allow_anonymous_stats', false);
set('http_group', 'www-data');
set('writable_mode', 'chgrp');
set('writable_use_sudo', true);

// Hosts

host('production')
    ->hostname('example.com')
    ->set('deploy_path', '/var/www/{{application}}')
    ->stage('production');

host('staging')
    ->hostname('example.com')
    ->set('deploy_path', '/var/www/staging.{{application}}')
    ->stage('staging');

// Tasks

// [Optional] If deploy fails automatically unlock
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release
before('deploy:symlink', 'artisan:migrate');

// [Optional] Reload the PHP-FPM service
desc('Reload the PHP-FPM service');
task('php-fpm:restart', function () {
    run('sudo /bin/systemctl reload php7.4-fpm');
});
after('deploy:symlink', 'php-fpm:restart');

// [Optional] Restart the queue worker
// after('deploy:symlink', 'artisan:queue:restart')

// Deploy production assets
task('deploy:assets', function () {
    runLocally('npm run prod');
    upload('public/css/', '{{release_path}}/public/css/');
    upload('public/img/', '{{release_path}}/public/img/');
    upload('public/js/', '{{release_path}}/public/js/');
    upload('public/mix-manifest.json', '{{release_path}}/public/');
});
after('deploy:vendors', 'deploy:assets');
