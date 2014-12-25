<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 24/12/14
 * Time: 05:46
 */

namespace Uniplaces\STest\Search\AdvancedSearch;

use Uniplaces\STest\Search\SearchOperations;
use Uniplaces\STest\Search\SearchProperties;

class AdvancedSearch extends SearchOperations {


    public function __construct()
    {
        $this->search[SearchProperties::ADDRESS] = AdvancedSearchFactory::createAddress();
        $this->search[SearchProperties::PRICE]   = AdvancedSearchFactory::createPrice();
    }

}