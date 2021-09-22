<?php

    namespace App;
    use League\Csv\Reader;
    use League\Csv\Statement;
    use League\Csv\TabularDataReader;

    class Statistics
    {
        private Reader $statistics;

        public function __construct(string $path)
        {
            $this->statistics = Reader::createFromPath($path, 'r');
            $this->statistics->setHeaderOffset(0);
            $this->statistics->setDelimiter(';');
        }

        public function getStatistics(): Reader
        {
            return $this->statistics;
        }

        public function getHeader(): array
        {
            return $this->statistics->getHeader();
        }

        public function getStatement(): TabularDataReader
        {
            return Statement::create()->process($this->statistics);
        }
    }