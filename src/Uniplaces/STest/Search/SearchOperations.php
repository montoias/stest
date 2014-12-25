<?php
/**
 * Created by PhpStorm.
 * User: montoias
 * Date: 24/12/14
 * Time: 19:15
 */

namespace Uniplaces\STest\Search;


abstract class SearchOperations {

    /***
     * @var array
     *
     * $search is filled by __constructor() on subclasses.
     */
    public $search = array();

    public function filterType($searchType){
        foreach ($this->search as $k => $v) {
            if(!isset($searchType[$k])){
                unset($this->search[$k]);
            }
        }
        return $this->search;
    }

}