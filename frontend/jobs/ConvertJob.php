<?php


namespace frontend\jobs;


use yii\base\Object;
use yii\queue\Job;
use yii\queue\Queue;

class ConvertJob extends Object implements Job
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
		//ffmpeg -i ./sample.mp4 -r 10 -vf scale=512:-1 ./sample.gif
		\Yii::$app->consoleRunner->run('-i '.$this->inPath.' -r '.$this->frames.' -vf scale='.$this->size.':-1 '.$this->outPath);
	}
}