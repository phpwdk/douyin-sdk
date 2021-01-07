<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

class Toutiao extends BaseApi
{
    public function authorize($scope, $redirect_url, $state = '')
    {
        $api_url = self::BASE_TOUTIAO_API . '/oauth/authorize/';
        $params = [
            'client_key' => $this->client_key,
            'response_type' => 'code',
            'scope' => implode(',', $scope),
            'redirect_uri' => $redirect_url,
        ];
        if ($state != '') {
            $params['state'] = $state;
        }
        return $this->cloud_http_post($api_url, $params);
    }

    public function access_token($code)
    {
        $api = self::BASE_TOUTIAO_API . '/oauth/access_token/';
        $params = ['code' => $code];
        return $this->cloud_http_post($api, $params);
    }

    public function refresh_token($refresh_token)
    {
        $api = self::BASE_TOUTIAO_API . '/oauth/refresh_token/';
        $params = ['refresh_token' => $refresh_token];
        return $this->cloud_http_post($api, $params);
    }

    public function client_token()
    {
        $api_url = self::BASE_TOUTIAO_API . '/oauth/client_token/';
        $params = [];
        return $this->cloud_http_post($api_url, $params);
    }
}
