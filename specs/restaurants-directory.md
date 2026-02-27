# Restaurants Directory

## Templates

### Restaurants (Index)

Name: restaurants
Label: Restaurants
Parent template: none
Child templates: restaurant
New pages: one/no
Children pages: yes

**Fields:**

| field | Label | Type |
| ----- | ----- | ---- |
| title | Title | text |

### Restaurant (Detail)

Name: restaurant
Label: Restaurant
Parent template: restaurants
Child templates: none
New pages: yes
Children pages: no

**Fields:**

| field                   | Label         | Type                                  |
| ----------------------- | ------------- | ------------------------------------- |
| title                   | Title         | text                                  |
| body_markdown           | Body          | textarea (TextformatterMarkdownExtra) |
| image_icon              | Image         | image                                 |
| image_hero              | Image         | image                                 |
| street                  | Address       | text                                  |
| zip                     | Address       | text                                  |
| city                    | Address       | text                                  |
| area                    | Address       | text                                  |
| phone                   | Phone         | text                                  |
| email                   | Email         | text                                  |
| website                 | Website       | URL                                   |
| opening_hours_monday    | Opening Hours | text                                  |
| opening_hours_tuesday   | Opening Hours | text                                  |
| opening_hours_wednesday | Opening Hours | text                                  |
| opening_hours_thursday  | Opening Hours | text                                  |
| opening_hours_friday    | Opening Hours | text                                  |
| opening_hours_saturday  | Opening Hours | text                                  |
| opening_hours_sunday    | Opening Hours | text                                  |
| cuisine                 | Cuisine       | page (cuisine)                        |
| price_range             | Price Range   | page (price_range)                    |
| is_verified             | Status        | checkbox                              |
| is_premium              | Status        | checkbox                              |

### Cuisines (Index)

Name: cuisines
Label: Cuisines
Parent template: none
Child templates: cuisine
New pages: one/no
Children pages: yes

**Fields:**

| field | Label | Type |
| ----- | ----- | ---- |
| title | Title | text |

### Cuisine (Detail)

Name: cuisine
Label: Cuisine
Parent template: cuisines
Child templates: none
New pages: yes
Children pages: no

**Fields:**

| field | Label | Type |
| ----- | ----- | ---- |
| title | Title | text |

### Price Ranges (Index)

Name: price_ranges
Label: Price Ranges
Parent template: none
Child templates: price_range
New pages: one/no
Children pages: yes

**Fields:**

| field | Label | Type |
| ----- | ----- | ---- |
| title | Title | text |

### Price Range (Detail)

Name: price_range
Label: Price Range
Parent template: price_ranges
Child templates: none
New pages: yes
Children pages: no

**Fields:**

| field | Label | Type |
| ----- | ----- | ---- |
| title | Title | text |

## Implementation Notes

### Page Structure

Index pages are created under Home (`/`):

- `/restaurants/` - Restaurant listing
- `/cuisines/` - Cuisine categories
- `/price-ranges/` - Price range options

### Files Created

| File                              | Purpose                                        |
| --------------------------------- | ---------------------------------------------- |
| `site/migrate.php`                | RockMigrations: fields, templates, index pages |
| `site/templates/restaurants.php`  | Restaurant listing                             |
| `site/templates/restaurant.php`   | Single restaurant detail                       |
| `site/templates/cuisines.php`     | Cuisine listing                                |
| `site/templates/cuisine.php`      | Restaurants by cuisine                         |
| `site/templates/price_ranges.php` | Price range listing                            |
| `site/templates/price_range.php`  | Restaurants by price                           |
| `site/classes/*Page.php`          | Page classes with typed properties             |

### RockMigrations Patterns Used

```php
// Template field assignment: use fields- for initial setup (removes unlisted)
'fields-' => ['title', 'body_markdown', ...],

// Page reference field
'cuisine' => [
  'type' => 'page',
  'derefAsPage' => 1,  // 1=single Page, 0=PageArray
  'inputfield' => 'InputfieldSelect',
  'findPagesSelector' => 'template=cuisine',
],

// Create index pages under home
$rm->createPage(template: 'restaurants', parent: $home, name: 'restaurants', title: 'Restaurants');
```

### Naming Conventions

| Template       | Template File      | Page Class        |
| -------------- | ------------------ | ----------------- |
| `restaurants`  | `restaurants.php`  | `RestaurantsPage` |
| `restaurant`   | `restaurant.php`   | `RestaurantPage`  |
| `price_ranges` | `price_ranges.php` | `PriceRangesPage` |

### Tasks

- [x] create new fields and templates in backend
- [x] create new template files in @site/templates/
- [x] create necessary pages (restaurants, cuisines, price ranges)
- [x] Use RockMigrations to create the templates and fields
- [x] Look up available skills and tools to complete tasks

### Future Enhancements

- [ ] Add sample cuisine pages (Italian, Japanese, etc.)
- [ ] Add sample price range pages ($, $$, $$$)
- [ ] Consider combining opening hours into a Repeater for flexibility
- [ ] Add search/filter functionality to restaurants listing

![NOTE]: writing to @site/migrate.php will apply changes automatically, no need to run `ddev exec php ...`
