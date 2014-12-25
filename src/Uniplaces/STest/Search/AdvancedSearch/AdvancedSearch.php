<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 24/12/14
 * Time: 05:46
 */

namespace Uniplaces\STest\Search\AdvancedSearch;

use Uniplaces\STest\Search\SearchInterface;
use Uniplaces\STest\Search\SearchOperations;

class AdvancedSearch extends SearchOperations {


    public function __construct()
    {
        $this->search['address'] = AdvancedSearchFactory::createAddress();
        $this->search['price']   = AdvancedSearchFactory::createPrice();
    }

}