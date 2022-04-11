<?php

namespace Ivan\LinkedList\SinglyLinkedList;

class Node
{
    private $data;
    private $next = null;

    function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param null|Node $node
     * @return void
     */
    public function setNext(?Node $node): void
    {
        $this->next = $node;
    }

    /**
     * @return null|Node
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
