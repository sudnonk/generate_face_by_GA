<?php

class Experiment {
    /** @var int $exp_num 実験番号 */
    private static $exp_num;
    /** @var int $max_generation 何世代までやるか */
    private static $max_generation;
    /** @var string $goal_image_path ゴール画像のパス */
    private static $goal_image_path;
    /** @var string $save_path 保存先のパス */
    private static $save_path;

    public function __construct(int $max_generation, string $goal_image_path) {
        $this->setExpNum(time());
        $this->setMaxGeneration($max_generation);
        $this->setGoalImagePath($goal_image_path);

        /** 保存先ディレクトリの作成 */
        $save_dir = "imgs" . DIRECTORY_SEPARATOR . date("YmdHis", self::getExpNum());
        mkdir($save_dir);
        $this->setSavePath($save_dir);
    }

    /**
     * @return int
     */
    public static function getExpNum(): int {
        if (self::$exp_num === null) {
            die("construct first.");
        }
        return self::$exp_num;
    }

    /**
     * @param int $exp_num
     */
    private static function setExpNum(int $exp_num): void {
        self::$exp_num = $exp_num;
    }

    /**
     * @return int
     */
    public static function getMaxGeneration(): int {
        if (self::$max_generation === null) {
            die("construct first.");
        }
        return self::$max_generation;
    }

    /**
     * @param int $max_generation
     */
    private static function setMaxGeneration(int $max_generation): void {
        self::$max_generation = $max_generation;
    }

    /**
     * @return string
     */
    public static function getGoalImagePath(): string {
        if (self::$goal_image_path === null) {
            die("construct first.");
        }
        return self::$goal_image_path;
    }

    /**
     * @param string $goal_image_path
     */
    private static function setGoalImagePath(string $goal_image_path): void {
        self::$goal_image_path = $goal_image_path;
    }

    /**
     * @param string $save_path
     */
    private static function setSavePath(string $save_path):void{
        self::$save_path = $save_path;
    }

    /**
     * @return string
     */
    public static function getSavePath():string{
        if(self::$save_path === null){
            die("construct first.");
        }

        return self::$save_path;
    }

}