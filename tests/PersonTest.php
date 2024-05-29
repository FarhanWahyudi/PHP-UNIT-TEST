<?php
    namespace Hans\Test;

    use PHPUnit\Framework\TestCase;

    class PersonTest extends TestCase {
        private Person $person;

        protected function setUp(): void {
            $this->person = new Person('eko');
        }

        public function testSuccess() {
            $this->assertEquals('hello hans, my name is eko', $this->person->sayHello('hans'));
        }

        public function testException() {
            $this->expectException(\Exception::class);
            $this->person->sayHello(null);
        }

        public function testGoodByeSuccess() {
            $this->expectOutputString('good bye farhan' . PHP_EOL);
            $this->person->sayGoodBye('farhan');
        }
    }