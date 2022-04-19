<?php

namespace Ivan\Tests\Tree;

use PHPUnit\Framework\TestCase;
use Ivan\Tree\Tree;

class TreeTest extends TestCase
{
    public function test_create_tree()
    {
        $items = json_decode(file_get_contents(__DIR__ . "/treeNodes.json"), true);

        $actual = Tree::createTree($items);

        $expected = $this->expectedTree();

        $this->assertSame($expected, $actual);
    }

    public function test_no_subtree_found()
    {
        $tree = $this->expectedTree();

        $actual = Tree::findSubtree($tree, 999);

        $this->assertNull($actual);
    }

    public function test_find_subtree_without_children()
    {
        $tree = $this->expectedTree();

        $actual = Tree::findSubtree($tree, 1);

        $expected = $tree[1];

        $this->assertSame($expected, $actual);
    }

    public function test_find_subtree()
    {
        $tree = $this->expectedTree();

        $actual = Tree::findSubtree($tree, 5);

        $expected = $tree[2]["children"][3]["children"][5];

        $this->assertSame($expected, $actual);
    }

    public function test_get_full_hierarchy_path()
    {
        $tree = $this->expectedTree();

        $actual = Tree::getFullHierarchyPath($tree);

        $expected = [
            1 => 'docs',
            6 => 'images/2021/summer/japan',
            7 => 'images/2021/summer/canada',
            5 => 'images/2021/summer',
            3 => 'images/2021',
            4 => 'images/2022',
            2 => 'images',
        ];

        $this->assertSame($expected, $actual);
    }

    private function expectedTree()
    {
        return [
            1 => [
                "name" => "docs",
            ],
            2 => [
                "name" => "images",
                "children" => [
                    3 => [
                        "name" => "2021",
                        "children" => [
                            5 => [
                                "name" => "summer",
                                "children" => [
                                    6 => [
                                        "name" => "japan",
                                    ],
                                    7 => [
                                        "name" => "canada",
                                    ],
                                ]
                            ],
                        ]
                    ],
                    4 => [
                        "name" => "2022",
                    ]
                ]
            ]
        ];
    }
}
