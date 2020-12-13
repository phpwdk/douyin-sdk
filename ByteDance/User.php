<?php

namespace ByteDance\Douyin\Api;

use Kernel\BaseApi;
use Curl\Curl;

class User extends BaseApi
{
    /**
     * 获取用户信息
     * @param string $access_token
     * @param string $openid
     * @return User
     */
    public function userinfo($access_token , $openid){
        $api_url = self::BASE_API . '/oauth/userinfo/';

        $params = [
            'access_token'  => $access_token,
            'open_id'       => $openid
        ];
        return $this->https_get($api_url , $params);
    }

    /**
     * 获取粉丝列表
     * @param string $openid
     * @param string $access_token
     * @param int $page
     * @param int $cursor
     * @return User
     */
    public function fans($openid , $access_token , $page = 0 , $cursor = 30){
        $api_url = self::BASE_API . '/fans/list/';

        $params = [
            'open_id'   => $openid,
            'access_token'  => $access_token,
            'count'         => $page,
            'cursor'        => $cursor
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * 获取关注列表
     * @param string $openid
     * @param string $access_token
     * @param int $page
     * @param int $cursor
     * @return User
     */
    public function following_list($openid , $access_token , $page = 0 , $cursor = 30){
        $api_url = self::BASE_API . '/following/list/';

        $params = [
            'open_id'   => $openid,
            'access_token'  => $access_token ,
            'count'         => $page,
            'cursor'        => $cursor
        ];
        return $this->https_get($api_url, $params);
    }
}
