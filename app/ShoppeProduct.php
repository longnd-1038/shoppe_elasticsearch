<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class ShoppeProduct extends Model
{
    use ElasticquentTrait;

    protected $fillable = [
        'name',
        'description',
        'price',
        'branch',
        'make_by',
    ];

    protected $mappingProperties =  array(
        'name' => [
            'type' => 'text',
            'analyzer' => 'classic',
            'include_type_name' => true,
        ],
        'description' => [
            'type' => 'long',
            'analyzer' => 'classic',
            'include_type_name' => true,
        ],
        'name' => [
            'type' => 'text',
            'analyzer' => 'standard',
            'include_type_name' => true,
        ],
        'branch' => [
            'type' => 'text',
            'analyzer' => 'classic',
            'include_type_name' => true,
        ],
        'make_by' => [
            'type' => 'text',
            'analyzer' => 'classic',
            'include_type_name' => true,
        ],
    );

    function getIndexName()
    {
        return 'shoppe';
    }

    function getTypeName()
    {
        return 'product';
    }
}
