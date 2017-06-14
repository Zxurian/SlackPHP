<?php

namespace SlackPHP\Tests\SlackAPI\Serialization;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Serialization\Serializer;
use SlackPHP\Tests\SlackAPI\TestObjects\MockPayload;
use SlackPHP\Tests\SlackAPI\TestObjects\MockPayloadResponse;
use SlackPHP\Tests\SlackAPI\TestObjects\MockEnum;

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
    
    /**
     * Test the specific handlers of Enum custom
     */
    public function testSerializingEnum()
    {
        $serializer = Serializer::getSerializer();
        $payload = new MockPayload();
        
        $this->assertEquals(include 'MockPayloadArray.php', $serializer->toArray($payload));
    }
    
    public function testDeserializingEnum()
    {
        $serializer = Serializer::getSerializer();
        
        $response = $serializer->deserialize(include 'MockResponseJson.php', MockPayloadResponse::class, 'json');
        $refResponse = new \ReflectionObject($response);
        $okProperty = $refResponse->getProperty('ok');
        $okProperty->setAccessible(true);
        $this->assertEquals(true, $okProperty->getValue($response));
        $this->assertEquals('Sure. You’d be surprised how far a hug goes with Geordi, or Worf.', $response->string);
        $this->assertEquals('This &amp; that &lt; in &rt; there');
        $this->assertEquals(2017, $response->integer);
        $this->assertEquals(MockEnum::ONE(), $response->enum);
        $array1 = [
            MockEnum::THREE(),
            MockEnum::TWO(),
            MockEnum::ONE()
        ];
        $this->assertEquals($array1, $response->array1);
        $this->assertEquals(["riker", "laforge", "obrien"], $response->array2);
    }
    
}