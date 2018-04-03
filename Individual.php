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
        foreach ($this->genes as $gene) {
            /** @var int $color_code */
            $color_code = $gene->getColorCode();
            /** @var int $color_id */
            $color_id = $color_ids[$color_code];

            imagesetpixel($img, $gene->getX(), $gene->getY(), $color_id);
        }

        return $img;
    }

    public function save(string $save_dir): void {
        $save_path = $save_dir . DIRECTORY_SEPARATOR . $this->getDistance() . ".png";

        imagepng($this->to_image(), $save_path, 0, PNG_FILTER_NONE);
    }

    public static function sort(Individual $a, Individual $b): int {
        $a_distance = $a->getDistance();
        $b_distance = $b->getDistance();

        if ($a_distance === $b_distance) return 0;
        if ($a_distance < $b_distance) return -1;
        return 1;
    }
}