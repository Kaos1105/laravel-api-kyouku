<?php
namespace Deployer;

host('54.150.94.54')
    ->set('http_user', 'apache')
    ->stage('prod2')
    ->user('web-admin')
    ->port(10022)
    ->identityFile('deploy/ec2-keys/luxcampaign21sjcom-key.pem')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->set('branch', 'feature/#14_refactor_code')
    ->set('deploy_path', '/var/www/html/dmk_suju');
