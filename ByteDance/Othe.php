<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

class Othe extends BaseApi
{
    /**
     * 获取抖音信息
     * @param $real_share
     * @return mixed
     */
    public function get_rela_share($real_share, $is_iphone = 0)
    {
        $api_url = self::BASE_API . '/othe/get_rela_share/';
        $params = [
            'real_share' => $real_share,
            'is_iphone' => intval($is_iphone),
        ];
        return $this->cloud_http_post($api_url, $params);
    }
}
