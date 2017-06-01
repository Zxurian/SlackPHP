<?php

namespace SlackPHP\Tests\SlackAPI\Serialization;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Serialization\Serializer;

/**
 * @author Zxurian
 * @covers Serializer
 */
class SerializerTest extends TestCase
{
    /**
     * Test the serializer builder
     */
    public function testBuildingSerializer()
    {
        $stub = $this->createMock(Serializer::class);
        $refStub = new \ReflectionClass($stub);
        $method = $refStub->getMethod('buildSerializer');
        $method->setAccessible(true);
        
        $this->assertInstanceOf(\JMS\Serializer\Serializer::class, $method->invoke($stub));
    }
    
    /**
     * Test getting the built serializer
     */
    public function testGettingSerializer()
    {
        $this->assertInstanceOf(\JMS\Serializer\Serializer::class, Serializer::getSerializer());
    }
    
    /**
     * Test that the singleton is returned
     */
    public function testGettingSingleton()
    {
        $serializer = Serializer::getSerializer();
        $serializer2 = Serializer::getSerializer();
        
        $this->assertSame($serializer, $serializer2);
    }
}