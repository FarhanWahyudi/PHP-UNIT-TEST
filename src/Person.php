<?php
    namespace Hans\Test;

    class Person {
        public function __construct(private string $name) {

        }

        public function sayHello(?string $name) {
            if($name == null) throw new \Exception('name is null');
            return "hello $name, my name is $this->name";
        }

        public function sayGoodBye(?string $name):void {
            echo "good bye $name" . PHP_EOL;
        }
    }