<?php

/**
 * @author    MobiDev Corporation
 * @license   http://mobidev.biz/backvendor_license
 * @link      http://mobidev.biz/backvendor
 */

class SiteController extends CBackendController
{
    public function init()
    {
        $this->reconfigureBackend();
        $this->reconfigureEntityParamsDictionary();
        $this->reconfigureAccessRules();
        return parent::init();
    }

    private function reconfigureBackend()
    {
        self::$configuration = CMap::mergeArray(parent::$configuration, array(
//                 some new parameters here
                ));
    }

    protected function reconfigureMenu()
    {
        if (is_object($this->model))
        {
            $this->additionalMenuItems = CMap::mergeArray($this->additionalMenuItems, array(
//                      additional menu items here
                    ));
        }
    }

    private function reconfigureEntityParamsDictionary()
    {
        self::$entityConfigDictionary = CMap::mergeArray(parent::$entityConfigDictionary, array(
            'user' => array(
                'modelName' => 'User',
                'excludeFromGridView' => array(
                    'password', 'salt',
                ),
                'excludeFromDetailView' => array(
                    'password', 'salt',
                ),
                'modelAlias' => 'Blog User',
                'modelAliasPlural' => 'Blog Users',
                'bool' => array('admin'),
                'datetime' => array('creation_date'),
                'images' => array('image'),
                'title' => 'username',
                'link' => array(
                    'fb_link' => 'http://www.facebook.com/profile.php?id={value}'
                ),
                'password' => array('password'),
                'dropDown' => array(
                    'role' => array(
                        1 => 'Publisher',
                        2 => 'Moderator',
                        3 => 'Writer',
                    ),
                ),
                'maxUploadedImageSize' =>
                    array('width' => 200, 'height' => 200),
                'selectable' => 2,
                'nuke'=>true

            ),
            'post' => array(
                'modelName' => 'Post',
                'notUseTitleOfRelation' => array('author'),
            ),
            'postCategory' => array(
                'modelName' => 'PostCategory',
                'linksManyToManyRelation' => array('post', 'category')
            ),
            'category' => array(
                'modelName' => 'Category',
                'modelAliasPlural' => 'Categories',
            ),
        ));
    }

    private function reconfigureAccessRules()
    {
        self::$accessRules = CMap::mergeArray(array(
                    array(
                        // additional access rules here
                    ),
                        ), parent::$accessRules);
    }
    
    protected function mainMenuTemplate()
    {
        return array(
            'user',
            'SubMenu' => array(
                'post',
                'category',
            ),
        );
    }

}

?>