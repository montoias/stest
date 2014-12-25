<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 24/12/14
 * Time: 06:10
 */

namespace Uniplaces\STest\Search\AdvancedSearch;

use Uniplaces\STest\Search\SearchInterface;

class PriceSearch implements SearchInterface {

    public function execute($listing, $search) {
        $listingPrice = $listing->getPrice();
        $min = isset($search['price']['min']) ? $search['price']['min'] : null;
        $max = isset($search['price']['max']) ? $search['price']['max'] : null;

        return !(($min !== null && $min > $listingPrice) || ($max !== null && $max < $listingPrice));

    }

}