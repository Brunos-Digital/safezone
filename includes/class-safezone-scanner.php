<?php

if (!class_exists('Safezone_Scanner')) {
    class Safezone_Scanner
    {

        private string $directory;
        private array $keywords;

        public array $results;
        public mixed $startTime;


        public function __construct($directory, $keywords)
        {
            $this->directory = $directory;
            $this->keywords = $keywords;
            $this->startTime = microtime(true);
            $this->scanDirectory();
        }

        private function scanDirectory(): void
        {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->directory));
            foreach ($files as $file) {
                if ($file->isFile()) {
                    $this->scanFile($file->getPathname());
                }
            }
        }

        private function scanFile($file): void
        {
            $content = file_get_contents($file);
            foreach ($this->keywords as $keyword) {
                if (str_contains($content, $keyword)) {
                    $this->results[] = "Potentially suspicious content found in file: $file. Keyword: $keyword";
                    break;
                }
            }
        }

        public function scan(): array
        {
            return [
                'type' => 'database',
                'severity' => 1,
                'licence' => get_option('sz_licence'),
                'host' => $_SERVER['HTTP_HOST'],
                'protocol' => $_SERVER['SERVER_PROTOCOL'],
                'time' => number_format(microtime(true) - $this->startTime, 4) . ' sec',
                'wordpress_version' => get_bloginfo('version'),
                'rules' => $this->keywords,
                'results' => $this->results,
            ];
        }

    }
}
