<?php
namespace Application\Entity;

interface DataCreatedAndUpdatedInterface
{
    public function getDateCreated();
    public function setDateCreated($dateCreated);
    public function getDateUpdated();
    public function setDateUpdated($dateUpdated);
}