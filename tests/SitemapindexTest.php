<?php

use Sitemaped\Element\Sitemapindex\Sitemapindex;
use Sitemaped\Element\Sitemapindex\Sitemapnode;
use Sitemaped\Sitemap;

class SitemapindexTest extends \PHPUnit\Framework\TestCase
{
    public function testSitemap()
    {
        $index = new Sitemapindex();

        foreach (range(1, 2) as $i) {
            $sitemap = new Sitemapnode(
                'http://test.com/'.$i,
               '-1 year'
            );
            $index->addSitemap($sitemap);
        }

        $sitemap = new Sitemap($index);

        $content = $sitemap->toXmlString();

        $this->assertNotEmpty($content);
    }
}
