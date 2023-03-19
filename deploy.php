<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:fbnoi/gpt-view.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('101.43.90.39')
    ->set('remote_user', 'ubuntu')
    ->set('deploy_path', '~/gpt-view');

// tasks
desc('Install node modules');
task('npm:install', function () {
    run('cd {{release_or_current_path}} & npm install');
});

desc('Build assets');
task('npm:build', function () {
    run('cd {{release_or_current_path}} & npm build');
});

// Hooks
fail('deploy:prod', 'deploy:failed');

after('deploy:failed', 'deploy:unlock');

/**
 * Main deploy task.
 */
desc('Deploys online project');
task('deploy:prod', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:migrate',
    'npm:install',
    'npm:build',
    'deploy:publish',
]);
