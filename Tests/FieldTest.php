<?php

namespace TheLooper\Model;
use PHPUnit\Framework\TestCase;

class FieldTest extends TestCase
{

    static function setUpBeforeClass(): void
    {
        $sqlscript = file_get_contents(dirname(__DIR__,1).'/Doc/DB/MPD/MPD.sql');
        DbConnector::execute($sqlscript);
    }



    public function testall(){
        $expectedAmount = 3;
        $actualAmount = count(Field::all());

        $this->assertEquals($expectedAmount,$actualAmount);
    }

    public function testFind()
    {
        $this->assertInstanceOf(Field::class,Field::find(1));
        $this->assertNull(Field::find(1000));
    }

    public function testCreate(){
        $field = new Field("Par ce que les grilles pains",FieldValueKind::SINGLE_LINE,1);
        $this->assertTrue($field->create());
    }



}