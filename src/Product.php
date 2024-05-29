<?php
    namespace Hans\Test;

    class Product {
        private string $id, $name, $desc;
        private int $price, $quantity;

        public function getId(): string {
            return $this->id;
        }

        public function setId(string $id): void {
            $this->id = $id;
        }
        
        public function getName(): string {
            return $this->name;
        }

        public function setName(string $name): void {
            $this->name = $name;
        }
        public function getDesc(): string {
            return $this->desc;
        }

        public function setDesc(string $desc): void {
            $this->desc = $desc;
        }
        public function getPrice(): int {
            return $this->price;
        }

        public function setPrice(string $price): void {
            $this->price = $price;
        }
        public function getQuantity(): int {
            return $this->quantity;
        }

        public function setQuantity(string $quantity): void {
            $this->quantity = $quantity;
        }

    }