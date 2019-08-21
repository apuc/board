<?php


namespace frontend\jobs;


use common\models\db\AdsGif;
use Imagine\Imagick\Imagine;
use yii\base\BaseObject;
use yii\debug\models\search\Log;
use yii\log\Logger;
use yii\queue\JobInterface;
use yii\queue\Queue;
use vova07\console\ConsoleRunner;

class ConvertJob extends BaseObject implements JobInterface
{
	/** @var $path string Path to uploaded video file */
	public $inPath;

	/** @var $outPath string Path to converted file */
	public $gifPath;

	/** @var $gifSmallPath string Path to small size converted file */
	public $gifSmallPath;

	/** @var $gifThumbPath string Path to thumb of converted file */
	public $gifThumbPath;

	/** @var $itemID int Advertisement ID */
	public $itemID;

	/** @var int UserID */
	public $userID;

	/** @var string path of GIF for DB */
	public $pathForBase;

	/** @var string path of small sized GIF for DB */
	public $pathSmForBase;

	/** @var string path of GIF Thumb for DB */
	public $pathThumbForBase;

	/** @var $frames int amount of frames per second */
	private $frames;

	/** @var $size int size of picture height (px) */
	private $size;

	public function __construct($config = [])
	{
		parent::__construct($config);
		$this->size = 450;
		$this->frames = 15;
	}

	/**
	 * @param Queue $queue which pushed and is handling the job
	 * @return void|mixed result of the job execution
	 */
	public function execute($queue)
	{
//		ffmpeg -i ./sample.mp4 -r 10 -vf scale=512:-1 ./sample.gif
		shell_exec('ffmpeg -i '.$this->inPath.' -r '.$this->frames.' -vf scale='.$this->size.':-1 '.$this->gifPath);
		shell_exec('ffmpeg -i '.$this->inPath.' -r 12 -vf scale=275:-1 '.$this->gifSmallPath);

//		ffmpeg -y -ss 30 -t 3 -i input.flv -filter_complex "fps=10,scale=320:-1:flags=lanczos[x];[x]split[x1][x2];[x1]palettegen[p];[x2][p]paletteuse" output.gif
//		shell_exec('ffmpeg -i '.$this->inPath.' -filter_complex "fps='.$this->frames.',scale='.$this->size.':-1:flags=lanczos[x];[x]split[x1][x2];[x1]palettegen[p];[x2][p]paletteuse" '.$this->gifPath);
		shell_exec('rm '.$this->inPath);

		print_r('after remove!',false);

		$imagickInstance = new Imagine();
		$imageStream = $imagickInstance->open($this->gifPath);
		$layers = $imageStream->layers();
		$layers->get(0)->save($this->gifThumbPath);

		print_r('First frame got!', false);

		$gif = new AdsGif();
		$gif->user_id = $this->userID;
		$gif->ads_id = $this->itemID;
		$gif->img = $this->pathForBase;
		$gif->img_small = $this->pathSmForBase;
		$gif->img_thumb = $this->pathThumbForBase;
		$gif->save();
	}
}