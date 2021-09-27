<?php

namespace App\Classe;

use App\Entity\Category;

class  Search
{
    /**
     * @var string
     */
    public $string = '';

    /**
     * @var Category
     */
    public $categories = [];

    /**
     * @var string
     */
    public $city = '';

    /**
     * @var null|integer
     */
    public $max;

    /**
     * @var null|integer
     */
    public $min;
}