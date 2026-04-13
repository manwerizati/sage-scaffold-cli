<?php

class BlockGenerator {
    private $blockName;
    private $stubPath;

    public function __construct($blockName, $stubPath) {
        $this->blockName = $blockName;
        $this->stubPath = $stubPath;
    }

    public function generate() {
        $content = file_get_contents($this->stubPath);
        $manage = str_replace("{{ NAME }}", $this->blockName, $content);
        file_put_contents($this->blockName . '.txt', $manage);
    }
}