<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\SingleCommandApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

$app = new SingleCommandApplication();

$app->addArgument('name', InputArgument::REQUIRED, "Type your section name");

$app->setCode(function (InputInterface $input, OutputInterface $output) {
    $name = $input->getArgument('name');

    $content = file_get_contents('template.stub');
    $manage = str_replace("{{ NAME }}", $name, $content);
    file_put_contents('output.txt', $manage);

    $output->writeln("File generated!");
    
    return 0;
});

$app->run();