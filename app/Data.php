<?php

    //todo search functionality needed!!!!!!!!!!!!!!!

    namespace App;

    use League\Csv\Reader;

    class Data
    {
        private array $header;
        private $records;

        public function dataLoader()
        {
            $csv = Reader::createFromPath('app/Data/data.csv', 'r');
            $csv->setHeaderOffset(0);

            $this->header = $csv->getHeader();
            //$csv->setDelimiter(";");
            $this->records = $csv->getRecords();
        }

        public function explodeHeader(): array
        {
            return explode(";",$this->header[0]);
        }

        public function explodeRecords(): array
        {
            $tmpRecords = [];
            foreach ($this->records as $records){
                foreach($records as $record){
                    $tmpRecords[] = explode(";", $record);
                }
            }
            return $this->records = $tmpRecords;
        }

        public function getRecords()
        {
            return $this->records;
        }

    }