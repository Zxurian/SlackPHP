<?php 

namespace SlackPHP\Tests\SlackAPI\TestObjects;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\Tests\SlackAPI\TestObjects\MockEnum;
use JMS\Serializer\Annotation\Type;

class MockPayload extends AbstractPayload
{
    const METHOD = 'channels.archive';
    
    /** 
     * @var string
     * @Type ("string") 
     */
    public $string = 'Sure. You’d be surprised how far a hug goes with Geordi, or Worf.';
    
    /** 
     * @var int
     * @Type ("integer") 
     */
    public $integer = 2017;
    
    /** 
     * @var MockEnum
     * @Type("MyCLabsEnum<SlackPHP\Tests\SlackAPI\TestObjects\MockEnum>")
     */
    public $enum = null;
    
    /**
     * @var mixed[]
     * @Type("array")
     */
    public $array1 = [];
    
    /** 
     * @var mixed[]
     * @Type("array") 
     */
    public $array2 = [];
    
    public function __construct()
    {
        $this->enum = MockEnum::ONE();
        
        $this->array1 = [
            MockEnum::THREE(),
            MockEnum::TWO(),
            MockEnum::ONE(),
        ];
        
        $this->array2[] = [
            'subProp1'   => 20,
            'subProp2'   => 'Our neural pathways have become accustomed to your sensory input patterns.',
        ];
        $this->array2[] = [
            'subProp1'   => 17,
            'subProp2'   => 'In all trust, there is the possibility for betrayal.',
        ];
    }
    
    public function validatePayload(){}
}