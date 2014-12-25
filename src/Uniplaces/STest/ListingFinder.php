<?php

namespace Uniplaces\STest;

use Uniplaces\STest\Listing\Listing;
use Uniplaces\STest\Search\Search;

class ListingFinder implements ListingFinderInterface
{
    /**
     * @var string
     */
    protected $searchType;

    /***
     * @var Search
     *
     * 'simple'   => Obj
     * 'advanced' => Obj
     */
    protected $searchMethods;

    /**
     * @param string $searchType simple|advanced
     */
    public function __construct($searchType = 'simple')
    {
        $this->searchType = $searchType;
        $this->searchMethods = new Search();
    }

    /**
     * @param Listing[] $listings
     * @param array     $search
     *
     * @return Listing[]
     */
    public function reduce(array $listings, array $search)
    {
        $matchListings = array();

        foreach ($listings as $listing) {

            if(!ListingFilter::isCriteriaMatched($listing, $search)){
                continue;
            }

            $searchMethod = $this->searchMethods->type($this->searchType);

            foreach ($searchMethod->filterType($search) as $k => $v) {
                if (!$v->execute($listing, $search)) {
                    continue 2;
                }
            }

            $matchListings[] = $listing;
        }

        return $matchListings;
    }

}
