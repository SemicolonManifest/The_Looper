<?php
namespace TheLooper\Model;
use PHPUnit\Framework\TestCase;

class TakeTest extends TestCase
{
    /**
     * @covers Take::all()
     */
    public function testAll()
    {
        $this->assertEquals(9,count(Take::all()));
    }

    /**
     * @covers Take::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(Take::class,Take::find(1));
        $this->assertNull(Take::find(1000));
    }

    /**
     * @covers $Take->create()
     */
    public function testCreate()
    {
        $Take = new Take();
        $Take->timeStamp = "2021-10-01 12:20:30";
        $this->assertTrue($Take->create());
    }

    /**
     * @covers $Take->delete()
     */
    public function testDelete()
    {
        $Take = Take::make(['time_stamp' => "2021-10-01 12:20:31"]);
        $Take->create();
        $id = $Take->id;
        $this->assertTrue($Take->delete()); // expected to succeed
        $this->assertNull(Take::find($id)); // we should not find it back
    }

    /**
     * @covers Take::destroy(id)
     */
    public function testDestroy()
    {
        $Take = Take::make(['time_stamp' => "2021-10-01 12:20:31"]);
        $Take->create();
        $id = $Take->id;
        $this->assertTrue(Take::destroy($id)); // expected to succeed
        $this->assertNull(Take::find($id)); // we should not find it back
    }

    /**
     * @covers $take->answers()
     */
    public function testTake()
    {
        $this->assertEquals(1,count(Take::find(1)->answers()));
        $this->assertEquals(2,count(Take::find(4)->answers()));
        $this->assertEquals(1,count(Take::find(3)->answers()));
    }


    public static function tearDownAfterClass() : void
    {
        DBConnector::execute("DELETE FROM Takes WHERE time_stamp = :time_stamp", ['time_stamp' => "2021-10-01 12:20:30"]);
    }
}