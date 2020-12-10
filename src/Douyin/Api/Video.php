<?php

namespace ByteDance\Douyin\Api;

use ByteDance\Douyin\Kernel\BaseApi;
use ByteDance\Douyin\Model\VideoDataBody;

class Video extends BaseApi
{
    public function video_data_api(array $videoDataBody, $openid, $access_token)
    {
        $api = self::BASE_API . '/video/data/';
        $params = [
            'open_id' => $openid,
            'access_token' => $access_token
        ];
        $api = $api . '?' . http_build_query($params);

        return $this->https_post($api, $videoDataBody, true);

    }

    public function video_list_get(string $openid, string $access_token, int $pagesize, int $cursor = 0)
    {
        $params = [
            'open_id' => $openid,
            'access_token' => $access_token,
            'count' => $pagesize,
            'cursor' => $cursor
        ];
        $url = self::BASE_API . '/video/list/';
        return $this->https_get($url, $params);

    }

    /**
     * @title 上传视频
     * @param $open_id
     * @param $access_token
     * @param $file
     * @return Video
     */
    public function video_upload($open_id, $access_token, $file)
    {
        $url = self::BASE_API . '/video/upload/?open_id=' . $open_id . '&access_token=' . $access_token;
        return $this->https_byte($url, $file);
    }

    /**
     * @title 创建视频
     * @param $open_id
     * @param $access_token
     * @param $video_id
     * @return Video
     */
    public function video_create($open_id, $access_token, $video_id)
    {
        $url = self::BASE_API . '/video/create/';
        $params = [
            'openid_id' => $open_id,
            'access_token' => $access_token,
            'video_id' => $video_id,
        ];
        return $this->https_post($url, $params);
    }
}
