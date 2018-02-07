<?php

namespace app\components\View;

use yii\web\View as YiiWebView;
use yii\base\InvalidCallException;

class WebView extends YiiWebView
{

    const META_TAG_TITLE = 'title';

    const META_TAG_KEYWORDS = 'keywords';

    const META_TAG_DESCRIPTIONS = 'description';

    public function init()
    {
        parent::init();
    }

    public function registerMetaTag($options, $key = null)
    {
        if ($key === null) {
            $this->metaTags[] = Html::tag('meta', '', $options);
        } else {
            if (in_array($key, [self::META_TAG_TITLE, self::META_TAG_KEYWORDS, self::META_TAG_DESCRIPTIONS]) && isset($this->metaTags[$key])) {
                throw new InvalidCallException("Meta tag `{$key}` is already set");
            } else {
                $this->metaTags[$key] = Html::tag('meta', '', $options);
            }
        }
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setMetaTitle($keywords = '')
    {
        $this->registerMetaTag($keywords, self::META_TAG_TITLE);
    }

    public function setMetaKeywords($keywords = '')
    {
        $this->registerMetaTag($keywords, self::META_TAG_KEYWORDS);
    }

    public function setMetaDescription($keywords = '')
    {
        $this->registerMetaTag($keywords, self::META_TAG_DESCRIPTIONS);
    }

}