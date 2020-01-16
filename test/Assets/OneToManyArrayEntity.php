<?php

declare(strict_types=1);

namespace DoctrineTest\Laminas\Hydrator\Assets;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class OneToManyArrayEntity
{
    protected int $id;

    /** @var Collection */
    protected Collection $entities;

    public function __construct()
    {
        $this->entities = new ArrayCollection();
    }

    public function setId($id) : void
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function addEntities(Collection $entities, $modifyValue = true) : void
    {
        foreach ($entities as $entity) {
            // Modify the value to illustrate the difference between by value and by reference
            if ($modifyValue) {
                $entity->setField('Modified from addEntities adder', false);
            }

            $this->entities->add($entity);
        }
    }

    public function removeEntities(Collection $entities) : void
    {
        foreach ($entities as $entity) {
            $this->entities->removeElement($entity);
        }
    }

    public function getEntities($modifyValue = true) : Collection
    {
        // Modify the value to illustrate the difference between by value and by reference
        if ($modifyValue) {
            foreach ($this->entities as $entity) {
                $entity->setField('Modified from getEntities getter', false);
            }
        }

        return $this->entities;
    }
}
