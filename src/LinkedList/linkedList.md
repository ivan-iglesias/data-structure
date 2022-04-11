# Linked List

A linked list is a linear data structure, in which the elements are not stored at contiguous memory locations. Each element (node) contains data and a reference to the next node in the sequence. More complex variants add additional links, allowing more efficient insertion or removal of nodes at arbitrary positions.

The principal benefit of a linked list over an array is that the list elements can be easily inserted or removed without reallocation or reorganization of the entire structure because the data elements do not need to be stored contiguously in memory or on disk.

**Advantages**

1. Since arrays data can only be stored in contiguous blocks of memory, its size cannot be altered at runtime due to the risk of overwriting other data. However, in a linked list, each node points to the next so data can exist at scattered addresses. This allows for a dynamic size that can change at runtime.

2. Insertion and deletion of nodes are really easier. Unlike array here we don’t have to shift elements after insertion or deletion of an element.

**Disadvantages**

1. Random access is not allowed. We have to access elements sequentially starting from the head node.

2. More memory is required to store elements in a linked list.

## Singly Linked List

It is the simplest type of linked list in which every node contains some data and a pointer to the next node of the same data type. A single linked list allows the traversal of data only in one way.

## Doubly Linked List

A doubly linked list is a more complex type of linked list that contains a pointer to the next as well as the previous node in sequence This would enable us to traverse the list in the backward direction as well.

## References

[geeksforgeeks](https://www.geeksforgeeks.org/linked-list-set-1-introduction)

[wikipedia](https://en.wikipedia.org/wiki/Linked_list)
