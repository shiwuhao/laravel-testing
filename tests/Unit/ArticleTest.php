<?php
/**
 * Created by PhpStorm.
 * User: shiwuhao
 * Date: 2017/6/26
 * Time: 下午10:48
 */

namespace Tests\Unit;


use App\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ArticleTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_fetches_trending_articles()
    {
        factory(Article::class, 3)->create();
        factory(Article::class)->create(['reads' => 10]);
        $mostPopular = factory(Article::class)->create(['reads' => 20]);

        $articles = Article::trending(3);

        $this->assertEquals($mostPopular->id, $articles->first()->id);
        $this->assertCount(3, $articles);
    }
}
