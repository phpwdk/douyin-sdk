<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

class Video extends BaseApi
{
    /**
     * @title 查询指定视频数据
     * @param $item_ids
     * @param $openid
     * @param $access_token
     * @return Video
     */
    public function video_data($item_ids, $openid, $access_token)
    {
        $api = self::BASE_API . '/video/data/';
        $params = [
            'open_id' => $openid,
            'access_token' => $access_token
        ];
        $api = $api . '?' . http_build_query($params);

        return $this->https_post($api, $item_ids, true);

    }

    /**
     * @title 查询授权账号视频数据
     * @param $openid
     * @param $access_token
     * @param $page
     * @param int $cursor
     * @return Video
     */
    public function video_list($openid, $access_token, $page = 0, $cursor = 0)
    {
        $params = [
            'open_id' => $openid,
            'access_token' => $access_token,
            'count' => $page,
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

    /**
     * @title 初始化分片上传
     * @param $open_id
     * @param $access_token
     * @return Video
     */
    public function video_part_init($open_id, $access_token)
    {
        $url = self::BASE_API . '/video/part/init/';
        $params = [
            'openid_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->https_post($url, $params);
    }

    /**
     * @title 上传视频分片到文件服务器
     * @param $open_id
     * @param $access_token
     * @param $upload_id
     * @param $part_number
     * @param $video
     * @return Video
     */
    public function video_part_upload($open_id, $access_token, $upload_id, $part_number, $video)
    {
        $params = [
            'openid_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id,
            'part_number' => $part_number,
        ];
        $url = self::BASE_API . '/video/part/upload/' . '?' . http_build_query($params);

        return $this->https_byte($url, $video);
    }

    /**
     * @title 分片完成上传
     * @param $open_id
     * @param $access_token
     * @param $upload_id
     * @return Video
     */
    public function video_part_complete($open_id, $access_token, $upload_id)
    {
        $params = [
            'openid_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id
        ];
        $url = self::BASE_API . '/video/part/upload/';

        return $this->https_post($url, $params);
    }
}
