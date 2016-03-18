<?php

trait Crawler
{
    public function seeElementHasAttribute($selector, $attribute, $value = null)
    {
        $elements = $this->crawler->filter($selector);

        $this->assertTrue(
            $elements->count() > 0,
            "Expected to find at least one element matching the selector \"{$selector}\"."
        );

        $hasAttribute = true;

        foreach ($elements as $element) {
            $this->assertTrue(
                $element->hasAttribute($attribute),
                "Expected \"{$selector}\" to have attribute \"{$attribute}\"."
            );

            if ($value != null) {
                $realValue = $element->getAttribute($attribute);
                $this->assertEquals(
                    $realValue, $value,
                    "Expected \"{$selector}\" to have attribute \"{$attribute}\" be value \"{$value}\" instead of \"{$realValue}\"."
                );
            }
        }

        return $this;
	}
}
