<?php

namespace Ivan\LinkedList;

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
    public function getData(): mixed
    {
        return $this->data;
    }
}
