<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

class Poi extends BaseApi
{

    /**
     * 获取商户信息
     * @param $access_token
     * @return array
     */
    public function supplier_sync($access_token)
    {
        $api_url = self::BASE_API . '/poi/supplier_sync/';
        $params = ['access_token' => $access_token];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * 查询商户信息
     * @param $access_token
     * @param $supplier_ext_id
     * @return array
     */
    public function supplier_query($access_token, $supplier_ext_id)
    {
        $api_url = self::BASE_API . '/poi/supplier_query/';
        $params = [
            'access_token' => $access_token,
            'supplier_ext_id' => $supplier_ext_id
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * 查询高德POI信息
     * @param $access_token
     * @param $amap_id
     * @return array
     */
    public function base_query_amap($access_token, $amap_id)
    {
        $api_url = self::BASE_API . '/poi/base_query_amap/';
        $params = [
            'access_token' => $access_token,
            'amap_id' => $amap_id
        ];
        return $this->cloud_http_post($api_url, $params);
    }
}
