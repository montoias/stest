<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 25/12/14
 * Time: 05:29
 */

namespace Uniplaces\STest\Search;


use Uniplaces\STest\Search\AdvancedSearch\AdvancedSearch;
use Uniplaces\STest\Search\SimpleSearch\SimpleSearch;


class SearchFactory {

    public static function simpleSearch()
    {
        return new SimpleSearch();
    }


    public static function advancedSearch()
    {
        return new AdvancedSearch();
    }

}