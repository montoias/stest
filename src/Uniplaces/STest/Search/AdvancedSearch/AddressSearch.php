<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 24/12/14
 * Time: 05:44
 */

namespace Uniplaces\STest\Search\AdvancedSearch;


use Uniplaces\STest\Search\SearchInterface;

class AddressSearch implements SearchInterface {

    public function execute($listing, $search) {

        $listingAddress = strtolower(trim($listing->getLocalization()->getAddress()));
        $address = strtolower(trim($search['address']));

        return !(levenshtein($listingAddress, $address) > 5);
    }

}