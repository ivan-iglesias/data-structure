<?php

namespace Ivan\Tests;

use PHPUnit\Framework\TestCase;
use Ivan\LinkedList\LinkedList;

class LinkedListTest extends TestCase
{
    const TOTAL_ITEMS = 5;

    protected function setUp(): void
    {
        $this->linkedList = $this->createLinkedList();
    }

    private function createLinkedList(): LinkedList
    {
        $linkedList = new LinkedList();

        for($i=1; $i <= self::TOTAL_ITEMS; $i++) {
            $linkedList->push($i);
        }

        return $linkedList;
    }

    public function test_linked_list_total_items()
    {
        $this->assertSame(self::TOTAL_ITEMS, $this->linkedList->count());
    }

    public function test_linked_list_to_array()
    {
        $expected = [5, 4, 3, 2, 1];

        $this->assertSame($expected, $this->linkedList->toArray());
    }

    /**
     * @depends test_linked_list_to_array
     */
    public function test_linked_list_remove_first_item()
    {
        $expected = [4, 3, 2, 1];

        $this->linkedList->delete(0);

        $this->assertSame($expected, $this->linkedList->toArray());
    }

    /**
     * @depends test_linked_list_to_array
     */
    public function test_linked_list_remove_last_item()
    {
        $expected = [5, 4, 3, 2];

        $this->linkedList->delete(4);

        $this->assertSame($expected, $this->linkedList->toArray());
    }

    /**
     * @depends test_linked_list_to_array
     */
    public function test_linked_list_remove_mid_item()
    {
        $expected = [5, 3, 2, 1];

        $this->linkedList->delete(1);

        $this->assertSame($expected, $this->linkedList->toArray());
    }

    /**
     * @depends test_linked_list_to_array
     */
    public function test_linked_list_remove_multiple_items()
    {
        $expected = [5, 2, 1];

        $this->linkedList->delete(1);
        $this->linkedList->delete(1);

        $this->assertSame($expected, $this->linkedList->toArray());
    }
}
