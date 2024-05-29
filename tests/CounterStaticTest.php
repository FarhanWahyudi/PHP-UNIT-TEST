<?php
    namespace Hans\Test;

    use PHPUnit\Framework\TestCase;

    class CounterStaticTest extends TestCase {
        public static Counter $counter;

        public static function setUpBeforeClass(): void {
            self::$counter = new Counter();
        }

        public function testFirst() {
            self::$counter->increment();
            $this->assertEquals(1, self::$counter->getCounter());
            $this->markTestSkipped('masih bingung');
        }

        public function testSecond() {
            self::$counter->increment();
            $this->assertEquals(2, self::$counter->getCounter());
        }

        public function testThird() {
            self::$counter->increment();
            $this->assertEquals(3, self::$counter->getCounter());
            $this->markTestIncomplete('todo on counter again');
        }
    }