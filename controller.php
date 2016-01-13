<?php        

namespace Concrete\Package\YoutubeResponsiveEmbed;
use Package;
use BlockType;
use SinglePage;
use PageTheme;
use BlockTypeSet;
use CollectionAttributeKey;
use Concrete\Core\Attribute\Type as AttributeType;
use Config;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

	protected $pkgHandle = 'youtube_responsive_embed';
	protected $appVersionRequired = '5.7.1';
	protected $pkgVersion = '0.9.1';
	
	public function getPackageDescription()
	{
		return t("Embeds a YouTube Video in your web page.");
	}

	public function getPackageName()
	{
		return t("YouTube Responsive Embed");
	}
	
	public function install()
	{
		$pkg = parent::install();
        BlockType::installBlockTypeFromPackage('youtube_responsive_embed', $pkg); 
	}
}
?>