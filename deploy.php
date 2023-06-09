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
set('nvm', 'source ~/.nvm/nvm.sh');
task('assert:build', function () {
    run('cd {{release_or_current_path}} && {{nvm}} && npm install && npm run build');
});

desc('Generate route js');
task('artisan:ziggy', artisan('ziggy:generate'));

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
    'artisan:ziggy',
    'assert:build',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:migrate',
    'deploy:publish',
]);
