<?php

class BlockGenerator {
    private $blockName;

    public function __construct($blockName) {
        $this->blockName = $blockName;
    }

    public function generate() {
        $bladeDir = 'resources/views/sections';
        $composerDir = 'app/View/Composers/';

        if (!is_dir($bladeDir)) {
            mkdir($bladeDir, 0777, true);
        }

        if (!is_dir($composerDir)) {
            mkdir($composerDir, 0777, true);
        }

        $bladeContent = file_get_contents('stubs/blade.stub');
        $bladeContent = str_replace("{{ NAME }}", $this->blockName, $bladeContent);
        $bladeFilePath = $bladeDir . '/' . $this->blockName . ".blade.php";
        file_put_contents($bladeFilePath, $bladeContent);

        $composerContent = file_get_contents('stubs/composer.stub');
        $composerContent = str_replace("{{ NAME }}", $this->blockName, $composerContent);
        $composerFilePath = $composerDir . '/' . $this->blockName . ".php";
        file_put_contents($composerFilePath, $composerContent);
    }
}