<?php

class Article{
	protected $content;

	public function __construct($content){
		$this->content = $content;
	}

	public function decorator(){
		return $this->content;
	}
}

$article = new Article('好好学习,天天向上,');
echo $article->decorator().'<br>';

//文章需要小编加摘要
class XArticle extends Article{
	public function summary(){
		return $this->decorator().'小编加了摘要,';
	}
}

$xarticle = new XArticle('好好学习,天天向上,,');
echo $xarticle->summary().'<br>';

//文章需要SEO加description
class SEOXArticle extends XArticle{
	public function SEO(){
		return $this->summary().'SEO加了description,';
	}
}

$seoxarticle = new SEOXArticle('好好学习,天天向上,,,');
echo $seoxarticle->SEO().'<br>';

/*
	problem:继承层次会越来越深
*/