<?php
namespace TheLooper\Model;
use PHPUnit\Framework\TestCase;

class ExerciseTest extends TestCase
{
    public function testCreate(): void
    {
        require_once dirname(__DIR__,1).'/Model/.env.php';
        $title ="UnitTest";

        $dbConnector = new DbConnector($DSN, $USERNAME, $PASSWORD);
       $exercise = new Exercise($title);
       $exerciseId = $exercise->create();
       $result = $dbConnector->selectOne("select title from exercises where id=:id;",['id'=>$exerciseId]);
       self::assertEquals($title,$result['title']);


    }

}