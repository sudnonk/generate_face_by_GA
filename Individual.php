<?php

class Individual {
    /** @var Gene[] $genes */
    private $genes;

    /** @var int width */
    const width = 256;
    /** @var int  height */
    const height = 256;

    /** @var int $distance */
    private $distance;

    /**
     * Individual constructor.
     *
     * @param Gene[] $genes array(0=>Gene,1=>Gene,...65535=>Gene);
     */
    public function __construct(array $genes) {
        $this->setGenes($genes);
    }

    /**
     * @param array $genes
     */
    private function setGenes(array $genes) {
        if (count($genes) !== self::width * self::height) {
            die("invalid individual.");
        }

        $this->genes = $genes;
    }

    /**
     * @return int
     */
    private function calcDistance(): int {
        /** @var Individual $goal */
        $goal = Goal::getGoal();
        /** @var int $distance 距離 */
        $distance = 0;

        for ($i = 0; $i < Individual::width * Individual::height; $i++) {
            $goal_gene = $goal->getGene($i);
            $self_gene = $this->getGene($i);
            $distance += Color::get_color_distance($goal_gene->getColorCode(), $self_gene->getColorCode());
        }

        return $distance;
    }

    /**
     * @param int $num
     *
     * @return Gene
     */
    public function getGene(int $num): Gene {
        return $this->genes[$num];
    }

    /**
     * @return Generator
     */
    public function getGeneGenerator() {
        foreach ($this->genes as $gene) {
            yield $gene;
        }
    }

    /**
     * @param Individual $individual1
     * @param Individual $individual2
     * @return Generator
     */
    public static function getGenesGenerator(Individual $individual1, Individual $individual2, Individual $individual3) {
        for ($i = 0; $i < Individual::width * Individual::height; $i++) {
            yield array($individual1->getGene($i), $individual2->getGene($i), $individual3->getGene($i));
        }
    }

    /**
     * @return int
     */
    public function getDistance(): int {
        if ($this->distance === null) {
            $this->distance = $this->calcDistance();
        }
        return $this->distance;
    }

    /**
     * @return resource
     */
    public function to_image() {
        /** @var resource $img */
        $img = imagecreate(self::width, self::height);

        /** @var array $color_ids */
        $color_ids = Color::getColorIds($img);
        foreach ($this->getGeneGenerator() as $gene) {
            /** @var int $color_code */
            $color_code = $gene->getColorCode();
            /** @var int $color_id */
            $color_id = $color_ids[$color_code];

            imagesetpixel($img, $gene->getX(), $gene->getY(), $color_id);
        }

        return $img;
    }

    /**
     * @param string $save_dir
     */
    public function save(string $save_dir): void {
        $save_path = $save_dir . DIRECTORY_SEPARATOR . $this->getDistance() . ".png";

        imagepng($this->to_image(), $save_path, 0, PNG_FILTER_NONE);
    }

    /**
     * usort用のコールバック関数
     *
     * @param Individual $a
     * @param Individual $b
     * @return int
     */
    public static function sort(Individual $a, Individual $b): int {
        $a_distance = $a->getDistance();
        $b_distance = $b->getDistance();

        if ($a_distance === $b_distance) return 0;
        if ($a_distance < $b_distance) return -1;
        return 1;
    }

    /**
     * 二つの親の遺伝子をそれぞれくらべ、より答えに近い遺伝子を子の遺伝子とする。
     *
     * @param Individual $parent1
     * @param Individual $parent2
     * @return Individual
     */
    public static function cross(Individual $parent1, Individual $parent2): Individual {
        $new_genes = array();
        memory(147);
        $count = 0;
        /** @var Gene[] $genes */
        foreach (Individual::getGenesGenerator($parent1, $parent2, Goal::getGoal()) as $genes) {
            $x = $genes[0]->getX();
            $y = $genes[1]->getY();

            $color1 = $genes[0]->getColorCode();
            $color2 = $genes[1]->getColorCode();
            $color_goal = $genes[2]->getColorCode();

            $dist1 = Color::get_color_distance($color1, $color_goal);
            $dist2 = Color::get_color_distance($color2, $color_goal);
            if ($dist1 < $dist2) {
                $new_genes[] = new Gene($x, $y, $color1);
            } else {
                $new_genes[] = new Gene($x, $y, $color2);
            }
            var_dump($count++);
        }

        return new Individual($new_genes);
    }
}