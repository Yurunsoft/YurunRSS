<?php
require_once '../YurunRSSWriter.class.php';
$rss = new YurunRSSWriter();
// 基本信息
$rss->channel['title'] = '我是标题';
$rss->channel['link'] = 'http://www.baidu.com';
$rss->channel['description'] = '我是简介';
// 可选信息
$rss->channel['pubDate'] = time();
$rss->channel['lastBuildDate'] = date('Y-m-d H:i:s');
$rss->channel['category'] = array(
	array('name'=>'分类1','domain'=>'http://www.baidu.com/1'),
	array('name'=>'分类2'),
);
$rss->channel['cloud'] = array(
	'domain'			=>	'',
	'port'				=>	'',
	'path'				=>	'',
	'registerProcedure'	=>	'',
	'protocol'			=>	'',
);
$rss->channel['image'] = array(
	'url'	=>	'1',
	'title'	=>	'2',
	'link'	=>	'3',
);
$rss->channel['textInput'] = array(
	'title'			=>	'1',
	'description'	=>	'2',
	'name'			=>	'3',
	'link'			=>	'4',
);
$rss->channel['skipHours'] = array(
	2,
	5,
);
$rss->channel['skipDays'] = array(
	2,
	5,
);
// 文章数据
$rss->items = array(
	array('title'=>'标题1','link'=>'http://www.baidu.com/1.html','description'=>'<a>666</a>'),
	array('title'=>'标题2','link'=>'http://www.baidu.com/2.html','category'=>array(
		array('name'=>'分类1','domain'=>'http://www.baidu.com/1'),
	)),
	array('title'=>'标题3','link'=>'http://www.baidu.com/3.html','pubDate'=>time()),
);
$rss->onSaveBefore(function($data){
	// 保存前置操作
	// $data['rss']
});
// $rss->saveToFile($fileName[,是否格式化，默认false]);
if($content = $rss->getRss(true))
{
	echo $content;
}
else
{
	echo $rss->error;
}