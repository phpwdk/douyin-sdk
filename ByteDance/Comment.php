<?php
namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 用户评论管理
 * Class Comment
 * @package ByteDance
 */
class Comment extends BaseApi
{
    /**
     * 回复视频评论
     * @param $access_token
     * @param $openid
     * @param $item_id
     * @param $content
     * @return array
     */
    public function reply($access_token, $openid, $item_id, $content)
    {
        $dyapi = self::BASE_API . '/comment/reply/';
        $params = [
            'open_id' => $openid,
            'access_token' => $access_token,
            'item_id' => $item_id,
            'content' => $content,
        ];

        return $this->cloud_http_post($dyapi, $params);
    }
}
