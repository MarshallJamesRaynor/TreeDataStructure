<?php
declare(strict_types=1);

namespace Pando;

use Pando\Component\DataObject;
use Pando\Component\PandoInterface;
use Pando\Component\PandoIterator;

class Pando extends DataObject implements PandoInterface
{

    /**
     * @var PandoInterface
     */
    private $parent;

    /**
     * @var array
     */
    private $children;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->children = [];

    }

    /**
     * {@inheritdoc}
     */
    public function add(PandoInterface $pando): PandoInterface
    {
        $pando->setParent($this);
        $this->children[] = $pando;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function remove(PandoInterface $pando): PandoInterface
    {
        // TODO: Implement remove() method.
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setParent(PandoInterface $pando): PandoInterface
    {
        $this->parent = $pando;
        return $this;
    }

    public function children(){

        return $this->children;
    }


    public function count(): int
    {
        return count($this->children);
    }

    public function getIterator(): PandoIterator
    {
        return new PandoIterator($this);
    }

    public function getReverseIterator(): PandoIterator
    {
        return new PandoIterator($this, true);
    }




}