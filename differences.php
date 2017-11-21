<?php
/**
 * Created by PhpStorm.
 * User: weinianhe
 * Date: 11/18/17
 * Time: 9:30 PM
 */
declare(strict_types=1);
class Tree {
    private $stem;

    /**
     * @return Tree
     */
    public function getStem(): Tree
    {
        return $this->stem;
    }

    /**
     * @param Tree $stem
     */
    public function setStem(Tree $stem)
    {
        $this->stem = $stem;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return array
     */
    public function getBranch(): array
    {
        return $this->branch;
    }

    /**
     * @param array $branch
     */
    public function setBranch(array $branch)
    {
        $this->branch = $branch;
    }

    /**
     * @return null
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param null $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    private $label;
    private $branch;
    private $dimensions;

    /**
     * Tree constructor.
     * @param $stem
     * @param $label
     * @param $branch
     * @param $dimensions
     */
    public function __construct(Tree $stem = null, $label, array $branch, $dimensions = null)
    {
        $this->stem = $stem;
        $this->label = $label;
        $this->branch = $branch;
        $this->dimensions = $dimensions;
    }

}

class Seed extends Tree{
    public function __construct(Tree $stem = null, $label, array $branch, $dimensions = null)
    {
        //parent::__construct($stem, $label, $branch, $dimensions);
    }
}


/**
 * Choices for the function: array of strings and output of the tree
 * multiple calls to the function with: references to the existing tree, and the string.
 *
 */
/**
 * This function takes multiple strings and convert it into a tree of characters
 * @param string $input
 */
function stringToTree(Tree &$tree=null, string $input){
    if (is_null($tree) || empty($input)) return;

    $content = str_split($input,1);
    $current = $tree;
    array_walk($content,function($item,$key) use (&$tree,&$current){
        $branch=$current->getBranch();
        $stem = null;
        if (count($branch)){
            /**
             * @var $stem Tree
             */
            foreach($branch as $existingStem){
                if (!empty($existingStem->getLabel()) && $existingStem->getLabel() == $item){
                    $stem = $existingStem;
                    break;
                }
            }

            /* If doesn't exists in the current branch, create and add to it*/
            /* Or we can exit this flow and and do: If the stem variable didn't exists we know we going to create one. however we need to capture the existing branch and check count on it*/
            if (is_null($stem)){
                $stem = new Tree($current,$item,array(),null);
                $branch [] = $stem;
                $current->setBranch($branch);
            }
        } else {
            $stem = new Tree($current,$item,array(),null);
            $current->setBranch(array($stem));
        }
        $current = $stem;
    });
}

function treeToTableView($tree){

}
$seed = new Seed(null,null,array(),null);
$tree = new Tree($seed,null,array(),null);

stringToTree($tree,"abc");
stringToTree($tree,"abd");
var_dump($tree);
