<?php

namespace TheLooper\Model;
use PHPUnit\Framework\TestCase;

class FieldTest extends TestCase
{

    protected function setUp(): void
    {
        $sqlscript = file_get_contents(dirname(__DIR__,1).'/Doc/DB/MPD/MPD.sql');
        $res = DbConnector::execute($sqlscript);
    }

    public function testCreate(){
        $field = new Field("Par ce que les grilles pains",FieldValueKind::SINGLE_LINE);
        $this->assertTrue($field->create());
    }

    public function testall(){
        $expectedAmount = 3;
        $actualAmount = count(Field::all());

        $this->assertEquals($expectedAmount,$actualAmount);
    }

}