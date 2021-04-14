<?php

namespace App\Http\Controllers;

use App\ShoppeProduct;
use Illuminate\Http\Request;
use function React\Promise\all;

class ShoppeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $initSearch = 'Vấy hồng cham bi nữ tjnh:))';
        $searchData = $request->get('search');
        $searchBy = [];
        $priceFilter = [
            'gte' => 0,
            'lte' => 1000000000,
        ];

        if ($searchData) {
            $initSearch = $searchData;
            $searchByName = $request->get('search-name');
            $searchByDescription = $request->get('search-description');
            $filterPrice = $request->get('price');
            if ($searchByName) {
                array_push($searchBy, 'name');
            }
            if ($searchByDescription) {
                array_push($searchBy, 'description');
            }

            if ($filterPrice == 'all') {
                $priceFilter = [
                    'gte' => 0,
                    'lte' => 1000000000,
                ];
            } else {
                $arrPrice = explode('-', $filterPrice);
                $priceFilter = [
                    'gte' => $arrPrice[0],
                    'lte' => $arrPrice[1],
                ];
            }

        }
        if (!$searchBy) {
            $searchBy = ['name', 'description', 'branch', 'make_by'];
        }


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

        return view('product_search')
            ->with('items', $items->getHits()['hits'])
            ->with('searchvalue', $initSearch)
            ->with('paramsearch', $request->all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShoppeProduct  $shoppeProduct
     * @return \Illuminate\Http\Response
     */
    public function suggestProduct(Request $request)
    {
        $fullText = $request->get('suggest');
        $item = ShoppeProduct::complexSearch([
           'body' => [
               'query' => [
                   'multi_match' => [
                       'query' => $fullText,
                       'fields' => ['name', 'description', 'make_by', 'branch'],
                   ]
               ]
           ]
        ]);

        return response()->json($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShoppeProduct  $shoppeProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppeProduct $shoppeProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShoppeProduct  $shoppeProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppeProduct $shoppeProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoppeProduct  $shoppeProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppeProduct $shoppeProduct)
    {
        //
    }

}
