<?php
ini_set("memory_limit", "1G");
require "init.php";

new Experiment(50, __DIR__ . DIRECTORY_SEPARATOR . "goal.png");

/** @var Individual[] $individuals 第零世代 */
$individuals = generate_random_individual(50);

/** @var Generation $generation */
$generation = new Generation(0, $individuals);

while ($generation->getGenerationCount() < Experiment::getMaxGeneration()) {
    echo "第" . $generation->getGenerationCount() . "世代　距離は" . $generation->getBestIndividual()->getDistance() . "\n";
    $generation = $generation->new_generation();
}