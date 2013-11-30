<?php

namespace sebber;

class Todo
{
  private $items = [];

  public function getItems()
  {
    return $this->items;
  }

  public function addItem($new_item)
  {
    $this->items[] = $new_item;

    error_log(serialize($this->items));
  }

  public function removeItem($item_to_remove)
  {
    $key = $this->getKeyOfItem($item_to_remove);
    if(empty($key) && $key !== 0)
      throw new MissingItemException("Tried to remove non-existing item from Todo-list");
    else
      unset($this->items[$key]);
  }

  public function getItem($item)
  {
    if(in_array($item, $this->items))
      return $item;
  }

  private function getKeyOfItem($item) {
    if(in_array($item, $this->items))
      return array_search($item, $this->items);
    else
      return NULL;
  }
}

class MissingItemException extends \Exception {}
