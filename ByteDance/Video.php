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
     * @return array
     */
    public function video_data($item_ids, $openid, $access_token)
    {
        $dyapi = self::BASE_API . '/video/video_data/';
        $params = [
            'open_id' => $openid,
            'access_token' => $access_token,
            'item_ids' => implode(',', !empty($item_ids) ? $item_ids : [])
        ];

        return $this->cloud_http_post($dyapi, $params);
    }

    /**
     * @title 查询授权账号视频数据
     * @param $openid
     * @param $access_token
     * @param $page
     * @param int $cursor
     * @return array
     */
    public function video_list($openid, $access_token, $page = 0, $cursor = 10)
    {
        $dyapi = self::BASE_API . '/video/video_list/';
        $params = [
            'open_id' => $openid,
            'access_token' => $access_token,
            'count' => $cursor,
            'cursor' => $page
        ];
        return $this->cloud_http_post($dyapi, $params);
    }

    /**
     * @title 上传视频
     * @param $open_id
     * @param $access_token
     * @param $file
     * @return array
     */
    public function video_upload($open_id, $access_token, $file)
    {
        $dyapi = self::DEMO_BASE_API . '/video/upload/?open_id=' . $open_id . '&access_token=' . $access_token;
        return $this->https_byte($dyapi, $file);
    }

    /**
     * @title 创建视频
     * @param $open_id
     * @param $access_token
     * @param $video_id
     * @param string $text
     * @param string $at_users
     * @return array
     */
    public function video_create($open_id, $access_token, $video_id, $text = '', $othes = [])
    {
        $dyapi = self::BASE_API . '/video/video_create/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'video_id' => $video_id,
            'text' => $text,
            'poi_name' => !empty($othes['poi_name']) ? $othes['poi_name'] : '',
            'poi_share' => !empty($othes['poi_share']) ? $othes['poi_share'] : '',
            'real_share' => !empty($othes['real_share']) ? $othes['real_share'] : '',
            'real_openid' => !empty($othes['real_openid']) ? $othes['real_openid'] : '',
            'micro_app_id' => !empty($othes['micro_app_id']) ? $othes['micro_app_id'] : '',
            'micro_app_title' => !empty($othes['micro_app_title']) ? $othes['micro_app_title'] : '',
            'micro_app_url' => !empty($othes['micro_app_url']) ? $othes['micro_app_url'] : '',
        ];
        return $this->cloud_http_post($dyapi, $params);
    }

    /**
     * @title 删除视频
     * @param $open_id
     * @param $access_token
     * @param $item_id
     * @return array
     */
    public function video_delete($open_id, $access_token, $item_id)
    {
        $dyapi = self::BASE_API . '/video/video_delete/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'item_id' => $item_id,
        ];
        return $this->cloud_http_post($dyapi, $params);
    }

    /**
     * @title 初始化分片上传
     * @param $open_id
     * @param $access_token
     * @return array
     */
    public function video_part_init($open_id, $access_token)
    {
        $dyapi = self::BASE_API . '/video/video_part_init/';
        $params = [
            'openid_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->cloud_http_post($dyapi, $params);
    }

    /**
     * @title 上传视频分片到文件服务器
     * @param $open_id
     * @param $access_token
     * @param $upload_id
     * @param $part_number
     * @param $video
     * @return array
     */
    public function video_part_upload($open_id, $access_token, $upload_id, $part_number, $video)
    {
        $params = [
            'openid_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id,
            'part_number' => $part_number,
        ];
        $dyapi = self::BASE_API . '/video/video_part_upload/' . '?' . http_build_query($params);

        return $this->cloud_http_post($dyapi, $video);
    }

    /**
     * @title 分片完成上传
     * @param $open_id
     * @param $access_token
     * @param $upload_id
     * @return array
     */
    public function video_part_complete($open_id, $access_token, $upload_id)
    {
        $params = [
            'openid_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id
        ];
        $dyapi = self::BASE_API . '/video/video_part_upload/';

        return $this->cloud_http_post($dyapi, $params);
    }
}
