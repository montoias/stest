<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 24/12/14
 * Time: 06:10
 */

namespace Uniplaces\STest\Search\AdvancedSearch;

use Uniplaces\STest\Search\SearchInterface;
use Uniplaces\STest\Search\SearchProperties;

class PriceSearch implements SearchInterface {

    public function execute($listing, $search) {
        $listingPrice = $listing->getPrice();
        $min = isset($search[SearchProperties::PRICE][SearchProperties::MIN]) ? $search[SearchProperties::PRICE][SearchProperties::MIN] : null;
        $max = isset($search[SearchProperties::PRICE][SearchProperties::MAX]) ? $search[SearchProperties::PRICE][SearchProperties::MAX] : null;

        return !(($min !== null && $min > $listingPrice) || ($max !== null && $max < $listingPrice));

    }

}