<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 12.05.2017
 * Time: 22:13
 */

namespace common\models;

use common\classes\Debug;

class VK
{

    public $client_id, $client_secret, $access_token;
    public $version = '5.64';

    /**
     * VK constructor.
     * @param $data array
     */
    public function __construct($data)
    {
        $this->client_id = $data['client_id'];
        $this->client_secret = $data['client_secret'];
        $this->access_token = $data['access_token'];
    }

    /**
     * @param $method string
     * @param $params array
     * @return string
     */
    public function createRequest($method, $params)
    {
        $r = 'https://api.vk.com/method/' . $method . '?';
        $paramsStr = '';
        foreach ((array)$params as $key => $param) {
            $paramsStr .= $key . '=' . $param . '&';
        }
        $r .= $paramsStr;
        $r .= 'access_token=' . $this->access_token . '&';
        $r .= 'v=' . $this->version;
        return $r;
    }

    /**
     * @param $method string
     * @param $params array
     * @return bool|string
     */
    public function request($method, $params)
    {
        $request = $this->createRequest($method, $params);
        //Debug::prn($request);
        return file_get_contents(urldecode($request));
    }

    /**
     * @param $domain
     * @param $data
     * @return bool|string
     */
    public function getGroupWall($domain, $data)
    {
        echo 'get group' . "\n";
        $data['domain'] = $domain;
        return $this->request('wall.get', $data);
    }

    public function setPostToGroup($ownerId, $data)
    {
        $data['owner_id'] = $ownerId;
        return $this->request('wall.post', $data);
    }

    /**
     * @param $group
     * @param $postId
     * @param array $data
     * @return bool|string
     */
    public function getPostComments($group, $postId, array $data = array())
    {
        $data['owner_id'] = $group;
        $data['post_id'] = $postId;
        return $this->request('wall.getComments', $data);
    }

    /**
     * @param $group
     * @param $postId
     * @param array $data
     * @return bool|string
     */
    public function getPostLikes($group, $postId, array $data = array())
    {
        $data['owner_id'] = $group;
        $data['item_id'] = $postId;
        $data['type'] = 'post';
        return $this->request('likes.getList', $data);
    }

    public function getUsers(array $ids, array $fields)
    {
        if (!empty($ids) && !empty($fields)) {
            $data['user_ids'] = implode(',', $ids);
            $data['fields'] = implode(',', $fields);
            return $this->request('users.get', $data);
        }
    }

}