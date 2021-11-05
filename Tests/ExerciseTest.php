<?php
namespace TheLooper\Model;
use PHPUnit\Framework\TestCase;

class ExerciseTest extends TestCase
{
    static function setUpBeforeClass(): void
    {
        $sqlscript = file_get_contents(dirname(__DIR__, 1) . '/Doc/DB/SQL/Script.sql');
        DbConnector::execute($sqlscript);
    }

    /**
     * @covers Exercise::all()
     */
    public function testAll()
    {
        $this->assertEquals(3,count(Exercise::all()));
    }

    /**
     * @covers Exercise::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(Exercise::class,Exercise::find(1));
        $this->assertNull(Exercise::find(1000));
    }

    /**
     * @covers $exercise->create()
     */
    public function testCreate()
    {
        $exercise = new Exercise();
        $exercise->title = "UnitTest";
        $exercise->state = 1;
        $this->assertTrue($exercise->create());
        $this->assertFalse($exercise->create());
    }

    /**
     * @covers $exercise->save()
     */
    public function testSave()
    {
        $exercise = Exercise::find(1);
        $savetitle = $exercise->title;
        $exercise->title = "newname";
        $this->assertTrue($exercise->save());
        $this->assertEquals("newname",Exercise::find(1)->title);
        $exercise->title = $savetitle;
        $exercise->save();
    }

    /**
     * @covers $exercise->delete()
     */
    public function testDelete()
    {
        $exercise = Exercise::make(["title" => "PHPUnit", "state" => 1]);
        $exercise->create();
        $id = $exercise->id;
        $this->assertTrue($exercise->delete()); // expected to succeed
        $this->assertNull(Exercise::find($id)); // we should not find it back
    }

    /**
     * @covers Exercise::destroy(id)
     */
    public function testDestroy()
    {
        $exercise = Exercise::make(["title" => "PHPUnit", "state" => 1]);
        $exercise->create();
        $id = $exercise->id;
        $this->assertTrue(Exercise::destroy($id)); // expected to succeed
        $this->assertNull(Exercise::find($id)); // we should not find it back
    }

    /**
     * @covers $exercise->fields()
     */
    public function testFields()
    {
        $this->assertEquals(1,count(Exercise::find(1)->fields()));
        $this->assertEquals(2,count(Exercise::find(2)->fields()));
        $this->assertEquals(1,count(Exercise::find(3)->fields()));
    }


    public static function tearDownAfterClass() : void
    {
        DBConnector::execute("DELETE FROM exercises WHERE title = :title", ["title" => "UnitTest"]);
    }
}