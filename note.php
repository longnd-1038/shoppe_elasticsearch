<?php






































$initSearch = "";
$searchBy ="";
$priceFilter ="";

$items = ShoppeProduct::complexSearch([
        'body' => [
            'query' => [
                "bool" => [
                    "must" => [
                        'multi_match' => [
                            'query' => $initSearch,
                            'fields' => $searchBy,
                            'fuzziness' => 'AUTO',
                        ]
                    ],
                    "filter" => [
                        "range" => [
                            "price" => $priceFilter
                        ]
                    ]

                ]
            ],
            'highlight' => [
                'pre_tags' => ['<b> <font color="#3d70a7">'],
                'post_tags' => ['</font> </b>'],
                'fields' => [
                    'description' => new \stdClass(),
                    'name' => new \stdClass()
                ],
                'require_field_match' => true
            ]
        ]]
);




