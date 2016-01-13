<?php

namespace Concrete\Package\YoutubeResponsiveEmbed\Block\YoutubeResponsiveEmbed;
use Loader;
use Concrete\Core\Block\BlockController;
use Core;

class Controller extends BlockController
{
    protected $btTable = 'btYoutubeResponsiveEmbed';
    protected $btInterfaceWidth = "350";
    protected $btInterfaceHeight = "300";
    protected $btDefaultSet = 'multimedia';
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = false;

    public $youtubeURL = "";
    public $maxWidth = "0";
    public $maxHeight = "0";
    public $aspectWidth = "16";
    public $aspectHeight = "9";

    /**
     * Used for localization. If we want to localize the name/description we have to include this.
     */
    public function getBlockTypeDescription()
    {
        return t("Embeds a YouTube Video in your web page.");
    }

    public function getBlockTypeName()
    {
        return t("YouTube Responsive Embed");
    }
    
    public function validate($data)
    {
        $e = Core::make('error');
        if (!$data['youtubeURL']) {
            $e->add(t('URL to YouTube video is required'));
        } elseif (!is_numeric($data['maxWidth'])) {
            $e->add(t('Max width must be numeric value'));
        } elseif (intval($data['maxWidth']) < 0) {
            $e->add(t('Max width mustn\'t be less than zero'));
        } elseif (!is_numeric($data['maxHeight'])) {
            $e->add(t('Max height must be numeric value'));
        } elseif (intval($data['maxHeight']) < 0) {
            $e->add(t('Max height mustn\'t be less than zero'));
        } elseif (!is_numeric($data['aspectWidth'])) {
            $e->add(t('Aspect ratio must be numeric value'));
        } elseif (intval($data['aspectWidth']) <= 0) {
            $e->add(t('Aspect Ratio must be greater than zero'));
        } elseif (!is_numeric($data['aspectHeight'])) {
            $e->add(t('Aspect ratio must be numeric value'));
        } elseif (intval($data['aspectHeight']) <= 0) {
            $e->add(t('Aspect Ratio must be greater than zero'));
        }
        return $e;
    }

    public function view()
    {
        $this->set('bID', $this->bID);
        $this->set('youtubeURL', $this->youtubeURL);
        $this->set('maxWidth', $this->maxWidth);
        $this->set('maxHeight', $this->maxHeight);
        $this->set('aspectWidth', $this->aspectWidth);
        $this->set('aspectHeight', $this->aspectHeight);
    }

    public function save($data)
    {
        $args['youtubeURL'] = isset($data['youtubeURL']) ? trim($data['youtubeURL']) : '';
        $args['maxWidth'] = isset($data['maxWidth']) ? trim($data['maxWidth']) : 0;
        $args['maxHeight'] = isset($data['maxHeight']) ? trim($data['maxHeight']) : 0;
        $args['aspectWidth'] = isset($data['aspectWidth']) ? trim($data['aspectWidth']) : 16;
        $args['aspectHeight'] = isset($data['aspectHeight']) ? trim($data['aspectHeight']) : 9;
        parent::save($args);
    }
}
