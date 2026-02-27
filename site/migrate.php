<?php

namespace ProcessWire;

/** @var RockMigrations $rm */
$rm = $this->wire->modules->get('RockMigrations');

$rm->migrate([
  'fields' => [
    'body_markdown' => [
      'type' => 'textarea',
      'label' => 'Body',
      'textformatters' => ['TextformatterMarkdownExtra'],
    ],
    'image_icon' => [
      'type' => 'image',
      'label' => 'Icon Image',
      'maxFiles' => 1,
      'extensions' => 'jpg jpeg png svg webp',
    ],
    'image_hero' => [
      'type' => 'image',
      'label' => 'Hero Image',
      'maxFiles' => 1,
      'extensions' => 'jpg jpeg png svg webp',
    ],
    'street' => [
      'type' => 'text',
      'label' => 'Address',
    ],
    'zip' => [
      'type' => 'text',
      'label' => 'Address',
    ],
    'city' => [
      'type' => 'text',
      'label' => 'Address',
    ],
    'area' => [
      'type' => 'text',
      'label' => 'Address',
    ],
    'phone' => [
      'type' => 'text',
      'label' => 'Phone',
    ],
    'email' => [
      'type' => 'text',
      'label' => 'Email',
    ],
    'website' => [
      'type' => 'URL',
      'label' => 'Website',
    ],
    'opening_hours_monday' => [
      'type' => 'text',
      'label' => 'Opening Hours Monday',
    ],
    'opening_hours_tuesday' => [
      'type' => 'text',
      'label' => 'Opening Hours Tuesday',
    ],
    'opening_hours_wednesday' => [
      'type' => 'text',
      'label' => 'Opening Hours Wednesday',
    ],
    'opening_hours_thursday' => [
      'type' => 'text',
      'label' => 'Opening Hours Thursday',
    ],
    'opening_hours_friday' => [
      'type' => 'text',
      'label' => 'Opening Hours Friday',
    ],
    'opening_hours_saturday' => [
      'type' => 'text',
      'label' => 'Opening Hours Saturday',
    ],
    'opening_hours_sunday' => [
      'type' => 'text',
      'label' => 'Opening Hours Sunday',
    ],
    'cuisine' => [
      'type' => 'page',
      'label' => 'Cuisine',
      'derefAsPage' => 1,
      'inputfield' => 'InputfieldSelect',
      'findPagesSelector' => 'template=cuisine',
      'labelFieldName' => 'title',
    ],
    'price_range' => [
      'type' => 'page',
      'label' => 'Price Range',
      'derefAsPage' => 1,
      'inputfield' => 'InputfieldSelect',
      'findPagesSelector' => 'template=price_range',
      'labelFieldName' => 'title',
    ],
    'is_verified' => [
      'type' => 'checkbox',
      'label' => 'Verified',
    ],
    'is_premium' => [
      'type' => 'checkbox',
      'label' => 'Premium',
    ],
  ],
  'templates' => [
    'restaurants' => [
      'label' => 'Restaurants',
      'fields-' => ['title'],
      'noChildren' => 0,
      'noParents' => 0,
      'childTemplates' => ['restaurant'],
    ],
    'restaurant' => [
      'label' => 'Restaurant',
      'fields-' => [
        'title',
        'body_markdown',
        'image_icon',
        'image_hero',
        'street',
        'zip',
        'city',
        'area',
        'phone',
        'email',
        'website',
        'opening_hours_monday',
        'opening_hours_tuesday',
        'opening_hours_wednesday',
        'opening_hours_thursday',
        'opening_hours_friday',
        'opening_hours_saturday',
        'opening_hours_sunday',
        'cuisine',
        'price_range',
        'is_verified',
        'is_premium',
      ],
      'noChildren' => 1,
      'parentTemplates' => ['restaurants'],
    ],
    'cuisines' => [
      'label' => 'Cuisines',
      'fields-' => ['title'],
      'noChildren' => 0,
      'noParents' => 0,
      'childTemplates' => ['cuisine'],
    ],
    'cuisine' => [
      'label' => 'Cuisine',
      'fields-' => ['title'],
      'noChildren' => 1,
      'parentTemplates' => ['cuisines'],
    ],
    'price_ranges' => [
      'label' => 'Price Ranges',
      'fields-' => ['title'],
      'noChildren' => 0,
      'noParents' => 0,
      'childTemplates' => ['price_range'],
    ],
    'price_range' => [
      'label' => 'Price Range',
      'fields-' => ['title'],
      'noChildren' => 1,
      'parentTemplates' => ['price_ranges'],
    ],
  ],
]);

$home = $pages->get('/');
$rm->createPage(template: 'restaurants', parent: $home, name: 'restaurants', title: 'Restaurants');
$rm->createPage(template: 'cuisines', parent: $home, name: 'cuisines', title: 'Cuisines');
$rm->createPage(template: 'price_ranges', parent: $home, name: 'price-ranges', title: 'Price Ranges');
