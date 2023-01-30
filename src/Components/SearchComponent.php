<?php


namespace App\Components;

use ACSEO\TypesenseBundle\Finder\TypesenseQuery;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveProp;


#[AsLiveComponent('search')]
class SearchComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string  $query = null;

    private $catalogFinder;

    public function __construct($catalogFinder)
    {
        $this->catalogFinder = $catalogFinder;
    }

    public function getData() : array
    {
        if(empty($this->query)) {
            return [];
        }

        $typesenseQuery = new TypesenseQuery($this->query, 'title');

        $result =  $this->catalogFinder->rawQuery($typesenseQuery)->getResults();


        return $result;
    }


}