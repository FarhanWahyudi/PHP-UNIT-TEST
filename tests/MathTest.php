<?php
    namespace Hans\Test;

    use PHPUnit\Framework\TestCase;
    
    class MathTest extends TestCase {
        public function testManual() {
            $this->assertEquals(0, Math::sum([5, 5]));
            $this->assertEquals(20, Math::sum([4, 4, 4, 4, 4]));
        }

        /**
         * @dataProvider mathSumData
         */
        public function testDataProvider(array $value, int $expected) {
            $this->assertEquals($expected, Math::sum($value));
        }

        public static function mathSumData(): array {
            return [
                [[5, 5], 10],
                [[4, 4, 4, 4, 4], 20],
                [[5, 5, 5], 15]
            ];
        }

        /**
         * @testWith [[5, 5], 10]
         *           [[4, 4, 4, 4, 4], 20]
         *           [[5, 5, 5], 15]
         */
        public function testWith(array $value, int $expected) {
            $this->assertEquals($expected, Math::sum($value));
        }
    }