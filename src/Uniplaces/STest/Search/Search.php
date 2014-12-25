<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 24/12/14
 * Time: 17:46
 */

namespace Uniplaces\STest\Search;

class Search {

    /***
     * @var array
     *
     * Keeps all different search type objects
     */
    protected $searchTypes;

    function __construct(){
        $this->searchTypes = array();
        $this->searchTypes[SearchProperties::SIMPLE]   = SearchFactory::simpleSearch();
        $this->searchTypes[SearchProperties::ADVANCED] = SearchFactory::advancedSearch();
       //$this->searchTypes['extra-ad'] = new AdvancedSearch();
    }

    public function type($id)
    {
        return $this->searchTypes[$id];
    }
}