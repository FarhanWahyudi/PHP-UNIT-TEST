<?php
    namespace Hans\Test;

    use PHPUnit\Framework\TestCase;

    class ProductServiceTest extends TestCase {
        private ProductRepository $repository;
        private ProductService $service;

        protected function setUp(): void {
            $this->repository = $this->createStub(ProductRepository::class);
            $this->service = new ProductService($this->repository);
        }

        public function testStub() {
            $product  = new Product();
            $product->setId('1');

            $this->repository->method('findById')->willReturn($product);
            $result = $this->repository->findById('4');
            $this->assertSame($product, $result);
        }

        public function testStubMap() {
            $product1 = new Product();
            $product1->setId('1');

            $product2 = new Product();
            $product2->setId('2');

            $map = [
                ['1', $product1],
                ['2', $product2]
            ];

            $this->repository->method('findById')->willReturnMap($map);

            $this->assertSame($product1, $this->repository->findById('1'));
            $this->assertSame($product2, $this->repository->findById('2'));
        }

        public function testStubCallback() {
            $this->repository->method('findById')->willReturnCallback(function (string $id) {
                $product = new Product();
                $product->setId($id);
                return $product;
            });

            $this->assertEquals('1', $this->repository->findById('1')->getId());
            $this->assertEquals('2', $this->repository->findById('2')->getId());
            $this->assertEquals('3', $this->repository->findById('3')->getId());
        }

        public function testRegisterSuccess() {
            $this->repository->method('findById')->willReturn(null);
            $this->repository->method('save')->willReturnArgument(0);

            $product = new Product();
            $product->setId('1');
            $product->setName('contoh');

            $result = $this->service->register($product);

            $this->assertEquals($product->getId(), $result->getId());
            $this->assertEquals($product->getName(), $result->getName());
        }

        public function testRegisterException() {
            $this->expectException(\Exception::class);

            $productInDb = new Product();
            $productInDb->setId('1');

            $this->repository->method('findById')->willReturn($productInDb);

            $product = new Product();
            $product->setId('1');

            $this->service->register($product);
        }

        public function testDeleteSuccess() {
            $product = new Product();
            $product->setId('1');

            $this->repository->method('findById')->willReturn($product);

            $this->service->delete('1');
            $this->assertTrue(true, 'success delete');
        }

        public function testDeleteException() {
            $this->expectException(\Exception::class);
            $this->repository->method('findById')->willReturn(null);

            $this->service->delete('1');
        }
    }