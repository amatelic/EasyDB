<?php

namespace spec\EasyDB\database;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use EasyDB\database\Mysql as My;

class MysqlSpec extends ObjectBehavior
{
	  function let()
	  {
	    $this->beConstructedWith("test");
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('EasyDB\database\Mysql');
    }
    function it_fetches_all_data()
    {
        $this->get()->shouldReturn([
           0 => [
            'id' => "1",
            'name' => "anze",
            'password' => "test",
          ],
          1 => [
            'id' => "2",
            'name' => "matetj",
            'password' => "test",
          ],

    ]);
    }
    public function order_by_desc()
    {
    	$this->orderBy(array("name", "desc"))->get()->shouldReturn([
           0 => [
            'id' => "2",
            'name' => "matej",
            'password' => "test",
          ],
          1 => [
            'id' => "1",
            'name' => "anze",
            'password' => "test",
          ],

      ]);
    }
    public function it_fetches_first_array_inObject()
    {
      $this->first()->shouldReturn(
         [  'id' => "1",
            'name' => "anze",
            'password' => "test",
          ]);
    }
    public function it_fetches_in_collums()
    {
      $this->beConstructedWith('test', ['id']);
      $this->first()->shouldReturn(
        [ 'id' => "1"]);
    }
}
