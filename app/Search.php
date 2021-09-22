<?php

    namespace App;

    class Search
    {
        public function search(string $element, ?string $search): bool
        {
            return $element === $search;
        }

        public function checkIfIsset(string $element): void
        {
            if(!isset($_GET[$element])) $_GET[$element] = '';
        }
    }