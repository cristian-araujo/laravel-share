<?php

namespace CristianAraujo\Share\Test;

use CristianAraujo\Share\ShareFacade;

class TwitterShareTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_generate_a_twitter_share_link_with_default_share_text()
    {
        $result = ShareFacade::page('https://codeswitch.be')->twitter();
        $expected = '<div id="social-links"><ul><li><a href="https://twitter.com/intent/tweet?text=Default+share+text&url=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fab fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_twitter_share_link_with_custom_share_text()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel')
            ->twitter();
        $expected = '<div id="social-links"><ul><li><a href="https://twitter.com/intent/tweet?text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel&url=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fab fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_facebook_share_link_with_a_custom_class()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel', ['class' => 'my-class'])
            ->twitter();
        $expected = '<div id="social-links"><ul><li><a href="https://twitter.com/intent/tweet?text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel&url=https://codeswitch.be" class="social-button my-class" id="" title="" rel=""><span class="fab fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_twitter_share_link_with_a_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel', ['id' => 'my-id'])
            ->twitter();
        $expected = '<div id="social-links"><ul><li><a href="https://twitter.com/intent/tweet?text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel&url=https://codeswitch.be" class="social-button " id="my-id" title="" rel=""><span class="fab fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_twitter_share_link_with_a_custom_class_and_custom_id()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel', ['class' => 'my-class', 'id' => 'my-id'])
            ->twitter();
        $expected = '<div id="social-links"><ul><li><a href="https://twitter.com/intent/tweet?text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel&url=https://codeswitch.be" class="social-button my-class" id="my-id" title="" rel=""><span class="fab fa-twitter"></span></a></li></ul></div>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_twitter_share_link_with_custom_prefix_and_suffix()
    {
        $result = ShareFacade::page('https://codeswitch.be', null, [], '<ul>', '</ul>')
            ->twitter();
        $expected = '<ul><li><a href="https://twitter.com/intent/tweet?text=Default+share+text&url=https://codeswitch.be" class="social-button " id="" title="" rel=""><span class="fab fa-twitter"></span></a></li></ul>';

        $this->assertEquals($expected, (string)$result);
    }

    /**
     * @test
     */
    public function it_can_generate_a_twitter_share_link_with_all_extra_options()
    {
        $result = ShareFacade::page('https://codeswitch.be', 'Meet Joren Van Hocht a php developer with a passion for laravel', ['class' => 'my-class', 'id' => 'my-id', 'title' => 'My Title for SEO', 'rel' => 'nofollow'], '<ul>', '</ul>')
            ->twitter();
        $expected = '<ul><li><a href="https://twitter.com/intent/tweet?text=Meet+Joren+Van+Hocht+a+php+developer+with+a+passion+for+laravel&url=https://codeswitch.be" class="social-button my-class" id="my-id" title="My Title for SEO" rel="nofollow"><span class="fab fa-twitter"></span></a></li></ul>';

        $this->assertEquals($expected, (string)$result);
    }
}
