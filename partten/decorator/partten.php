<?php

//装饰模式完成文章编辑

class Article{
	protected $content;
	protected $article;

	public function __construct($content){
		$this->content = $content;
	}

	public function decorator(){
		return $this->content;
	}
}

//文章需要小编加摘要
class XArticle extends Article{
	//传入父对象
	public function __construct(Article $article){
		$this->article = $article; //父对象赋给$this->article
	}

	public function decorator(){
		//父对象调用其函数decorator()
		return $this->article->decorator().'小编加了摘要,';
	}
}

//文章需要SEO加关键词
class SEOArticle extends Article{

	public function __construct(Article $article){
		$this->article = $article;
	}

	public function decorator(){
		return $this->article->decorator().'SEO加了关键词,';
	}
}


$article = new SEOArticle(new XArticle(new Article('好好学习,天天向上,')));
// $article = new XArticle(new SEOArticle(new Article('好好学习,天天向上,')));
echo $article->decorator().'<br>';