<?php
ini_set("memory_limit", "2G");
require "init.php";

memory(5);

new Experiment(50, __DIR__ . DIRECTORY_SEPARATOR . "goal.png");

memory(9);

/** @var Individual[] $individuals 第零世代 */
$individuals = generate_random_individual(50);

memory(14);

/** @var Generation $generation */
$generation = new Generation(0, $individuals);

unset($individuals);
memory(19);

while ($generation->getGenerationCount() < Experiment::getMaxGeneration()) {
    echo "第" . $generation->getGenerationCount() . "世代　距離は" . $generation->getBestIndividual()->getDistance() . "\n";

    memory(24);

    $new_generation = Generation::new_generation($generation);
    unset($generation);
    $generation = $new_generation;
    unset($new_generation);

    memory(28);
}

