<?php


namespace frontend\jobs;


use yii\base\BaseObject;
use yii\debug\models\search\Log;
use yii\log\Logger;
use yii\queue\JobInterface;
use yii\queue\Queue;
use vova07\console\ConsoleRunner;

class ConvertJob extends BaseObject implements JobInterface
{
	/**
	 * @var $path string Path to uploaded video file
	 */
	public $inPath;

	/**
	 * @var $outPath string Path to converted file
	 */
	public $outPath;
	/**
	 * @var $frames int amount of frames per second
	 */
	public $frames;

	/**
	 * @var $size int size of picture height (px)
	 */
	public $size;

	/**
	 * @param Queue $queue which pushed and is handling the job
	 * @return void|mixed result of the job execution
	 */
	public function execute($queue)
	{
		$runner = new ConsoleRunner(['file' => 'sudo /usr/bin/ffmpeg']);
		\Yii::debug('FFPMEG BEFORE  '.$runner->file);
		//ffmpeg -i ./sample.mp4 -r 10 -vf scale=512:-1 ./sample.gif
		$runner->run('-i '.$this->inPath.' -r '.$this->frames.' -vf scale='.$this->size.':-1 '.$this->outPath);
		\Yii::debug('FFPMEG COMMAND EXECUTED');
	}
}