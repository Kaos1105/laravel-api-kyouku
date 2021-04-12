<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'DMK_SUJU');

// Project repository
set('repository', 'git@github.com:GumiViet/vand_dmk_suju.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

set('keep_releases', 2);

set('git_recursive', false);

// Shared files/dirs between deploys
add('shared_files', [
    '.env',
]);
add('shared_dirs', [
    'storage',
    'bootstrap/cache',
]);

// Writable dirs by web server
add('writable_dirs', [
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

// Hosts

foreach (glob('deploy/config/*.php') as $file) {
    require_once $file;
}

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'artisan:view:clear',
    'artisan:cache:clear',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:optimize',
    'deploy:clear_paths',
    'deploy:symlink',
    'artisan:storage:link',
    'deploy:unlock',
    'cleanup',
    'success'
]);
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
