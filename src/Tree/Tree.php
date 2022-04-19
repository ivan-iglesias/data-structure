<?php

namespace Ivan\Tree;

class Tree
{
    /**
     * @param array $items
     * @param null|int $parentId
     * @return array
     */
    public static function createTree(
        array $items,
        ?int $parentId = null
    ): array {
        $tree = [];

        foreach ($items as $id => $item) {
            if ($item['parentId'] !== $parentId) {
                continue;
            }

            $node = [
                'name' => $item['name']
            ];

            $subTree = self::createTree($items, $item['id']);

            if (count($subTree) > 0) {
                $node['children'] = $subTree;
            }

            $tree[$item['id']] = $node;
            unset($items[$id]);
        }

        return $tree;
    }

    /**
     * @param array $items
     * @param int $id
     * @return null|array
     */
    public static function findSubtree(
        array $items,
        int $id
    ): ?array {
        $response = null;

        foreach ($items as $currentId => $item) {
            if ($currentId === $id) {
                return $item;
            }

            if (isset($item['children'])) {
                $response = self::findSubtree($item['children'], $id);
            }

            if ($response != null) {
                return $response;
            }
        }

        return null;
    }

    /**
     * @param array $tree
     * @param array $response DO NOT USE, for internal purpose
     * @param array $temp DO NOT USE, for internal purpose
     * @return array
     */
    public static function getFullHierarchyPath(
        array $tree,
        array &$response = [],
        array &$temp = []
    ): array {
        foreach ($tree as $id => $subTree) {
            $temp[] = $subTree['name'];

            if (isset($subTree['children'])) {
                self::getFullHierarchyPath($subTree['children'], $response, $temp);
            }

            $response[$id] = implode(DIRECTORY_SEPARATOR, $temp);
            array_pop($temp);
        }

        return $response;
    }
}
