<?php

class BlockGenerator {
    private $blockName;

    public function __construct($blockName) {
        $this->blockName = $blockName;
    }

    public function generate() {
        $files = [
            "blade" => [
              'dir' => "resources/views/sections",
              'stub' => "stubs/blade.stub",
              'ext' => ".blade.php",
            ],
            "composer" => [
                'dir' => "app/View/Composers/",
                'stub' => "stubs/composer.stub",
                'ext' => ".php",
            ]
        ];

        foreach ($files as $file) {
            if (!is_dir($file['dir'])) {
                mkdir($file['dir'], 0777, true);
            }

            $fileContent = file_get_contents($file['stub']);
            $fileContent = str_replace("{{ NAME }}", $this->blockName, $fileContent);
            $filePath = $file['dir'] . '/' . $this->blockName . $file['ext'];
            file_put_contents($filePath, $fileContent);
        }
    }
}