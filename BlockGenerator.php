<?php

class BlockGenerator {
    private $blockName;

    public function __construct($blockName) {
        $this->blockName = $blockName;
    }

    private function toPascalCase($string)
    {
        $spaces = preg_replace('/[-_]+/', ' ', $string);
        $capitalized = ucwords($spaces);
        return str_replace(' ', '', $capitalized);
    }

    private function toKebabCase($string)
    {
        $string = str_replace('_', '-', $string);
        $kebab = preg_replace('/(?<!^)([A-Z])/', '-$1', $string);
        return strtolower($kebab);
    }

    public function generate()
    {
        $pascalName = $this->toPascalCase($this->blockName);
        $kebabName = $this->toKebabCase($this->blockName);

        $files = [
            "blade" => [
              'dir' => "resources/views/sections",
              'stub' => "stubs/blade.stub",
              'ext' => ".blade.php",
              'filename' => $kebabName,
            ],
            "composer" => [
                'dir' => "app/View/Composers/",
                'stub' => "stubs/composer.stub",
                'ext' => ".php",
                'filename' => $pascalName,
            ]
        ];

        foreach ($files as $file) {
            if (!is_dir($file['dir'])) {
                mkdir($file['dir'], 0777, true);
            }

            $fileContent = file_get_contents($file['stub']);
            $fileContent = str_replace(["{{ NAME }}", "{{ PASCAL_NAME }}", "{{ KEBAB_NAME }}"], [$this->blockName, $pascalName, $kebabName], $fileContent);
            $filePath = $file['dir'] . '/' . $file['filename'] . $file['ext'];
            file_put_contents($filePath, $fileContent);
        }
    }
}