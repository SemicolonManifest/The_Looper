<?php
namespace TheLooper\Model;
use PHPUnit\Framework\TestCase;

class AnswerTest extends TestCase
{
    /**
     * @covers Answer::all()
     */
    public function testAll()
    {
        $this->assertEquals(7,count(Answer::all()));
    }

    /**
     * @covers Answer::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(Answer::class,Answer::find(1));
        $this->assertNull(Answer::find(1000));
    }

    /**
     * @covers $Answer->create()
     */
    public function testCreate()
    {
        $Answer = new Answer();
        $Answer->response = "UnitTest";
        $Answer->field = 3;
        $Answer->take = 2;
        $this->assertTrue($Answer->create());
        $this->assertFalse($Answer->create());
    }

    /**
     * @covers $Answer->save()
     */
    public function testSave()
    {
        $Answer = Answer::find(1);
        $saveresponse = $Answer->response;
        $Answer->response = "newname";
        $this->assertTrue($Answer->save());
        $this->assertEquals("newname",Answer::find(1)->response);
        $Answer->response = $saveresponse."prout";
        $Answer->save();
    }

    /**
     * @covers $Answer->save() doesn't allow duplicates
     */
    public function testSaveRejectsDuplicates()
    {
        $Answer = Answer::find(1);
        $Answer->take = Answer::find(2)->take;
        $this->assertFalse($Answer->save());
    }

    /**
     * @covers $Answer->delete()
     */
    public function testDelete()
    {
        $Answer = Answer::make(['response' => "PHPUnit", 'field' => 3, 'take' => 3]);
        $Answer->create();
        $id = $Answer->id;
        $this->assertTrue($Answer->delete()); // expected to succeed
        $this->assertNull(Answer::find($id)); // we should not find it back
    }

    /**
     * @covers Answer::destroy(id)
     */
    public function testDestroy()
    {
        $Answer = Answer::make(['response' => "PHPUnit", 'field' => 3, 'take' => 3]);
        $Answer->create();
        $id = $Answer->id;
        $this->assertTrue(Answer::destroy($id)); // expected to succeed
        $this->assertNull(Answer::find($id)); // we should not find it back
    }


    public static function tearDownAfterClass() : void
    {
        DBConnector::execute("DELETE FROM Answers WHERE response = :response", ["response" => "UnitTest"]);
    }
}