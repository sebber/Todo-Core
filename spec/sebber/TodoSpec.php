<?php

namespace spec\sebber;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TodoSpec extends ObjectBehavior
{
  function it_is_initializable()
  {
    $this->shouldHaveType('sebber\Todo');
  }

  function it_should_have_an_empty_list_of_todo_items()
  {
    $this->getItems()->shouldBeArray();
  }

  function it_should_contain_an_item_if_one_is_added_to_it()
  {
    $this->addItem("test");
    $this->getItems()->shouldHaveCount(1); 
  }

  function it_should_find_existing_item()
  {
    $this->addItem("test");
    $this->getItem("test");
  }

  function it_should_not_contain_an_item_if_the_last_is_removed()
  {
    $this->addItem("test");
    $this->getItems()->shouldHaveCount(1);
    $this->removeItem("test");
    $this->getItems()->shouldHaveCount(0);
  }

  function it_should_throw_exception_when_trying_to_remove_unexisting_item() 
  {
    $this->shouldThrow('sebber\MissingItemException')->duringRemoveItem("missing item");
  }
}
