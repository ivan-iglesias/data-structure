<?php

namespace Ivan\LinkedList\SinglyLinkedList;

class SinglyLinkedList
{
    private $head = null;
    private $count = 0;

    /**
     * @param mixed $data
     * @return void
     */
    public function push($data): void
    {
        $node = new Node($data);

        if (!is_null($this->head)) {
            $node->setNext($this->head);
        }

        $this->head = $node;

        $this->count++;
    }

    /**
     * @param int $index
     * @return void
     */
    public function delete(int $index): void
    {
        if ($index < 0  || $index > ($this->count-1)) {
            return;
        }

        if ($index === 0) {
            $this->head = $this->head->getNext();
            return;
        }

        $previous = $this->head;
        $current = $this->head->getNext();

        for ($i=1; $i < $index; $i++) {
            $previous = $current;
            $current = $current->getNext();
        }

        $previous->setNext($current->getNext());
        $this->count--;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->count;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $response = [];
        $node = $this->head;

        while (!is_null($node)) {
            $response[] = $node->getData();
            $node = $node->getNext();
        }

        return $response;
    }
}
