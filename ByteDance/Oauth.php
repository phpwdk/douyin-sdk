<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

class Oauth extends BaseApi
{
    public function connect($scope, $redirect_uri, $state = "")
    {
        $api_url = self::BASE_API . '/oauth/connect/';
        $params = [
            'scope' => implode(',', $scope),
            'redirect_uri' => $redirect_uri,
        ];
        if ($state) {
            $params['state'] = $state;
        }
        return $this->cloud_http_post($api_url, $params);
    }

    public function access_token($code)
    {
        $api_url = self::BASE_API . '/oauth/access_token/';
        $params = ['code' => $code];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * 刷新access_token或续期不会改变refresh_token的有效期
     * @param $refresh_token
     * @return Oauth
     */
    public function refresh_token($refresh_token)
    {
        $api_url = self::BASE_API . '/oauth/refresh_token/';
        $params = ['refresh_token' => $refresh_token];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * 刷新refresh_token
     * @param string $refresh_token
     * @return Oauth
     */
    public function renew_refresh_token($refresh_token)
    {
        $api_url = self::BASE_API . '/oauth/renew_refresh_token/';
        $params = ['refresh_token' => $refresh_token];
        return $this->cloud_http_post($api_url, $params);
    }

    public function client_token()
    {
        $api_url = self::BASE_API . '/oauth/client_token/';
        $params = [];
        return $this->cloud_http_post($api_url, $params);
    }
}
