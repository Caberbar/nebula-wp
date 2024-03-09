# Nebula WordPress Theme

## Description

Welcome to the Nebula WordPress theme, specifically designed for electronic music events. Nebula offers a unique visual and functional experience, perfect for promoting and organizing electronic music festivals.



## Repository Structure

### 1. nebula
Theme main folder

  - front-page.php: Main page of the theme where a little more about the festival is shown and the last 3 POSTS published using `WP_Query`.

  - index.php: News page where the last post is highlighted and then the others, with pagination included using `WP_Query` as well as a sidebar with a search bar, a calendar and a tag cloud.

  - archive-events.php: Events page showing the latest events (CPT), with pagination included using `WP_Query` as well as a sidebar with a search bar, a calendar and a tag cloud.

  - single.php and single-events: Template where the news or event is shown in its full size, with a comment box with a visitor counter and three last posts related to the post that is being displayed.

  - archives.php: W show the latest entries, events, tags, categories, last posts of each author, list of authors, most viewed posts, most commented posts and a list of last posts by day, month and year.

  - author.php: Photo and description of the author as well as his skills and 3 last posts using `WP_Query`.

  - privatezone.php: Login form with button to go to the admin area or log out, in case of successful login a message will be displayed using the my_messenger plugin

### 2. plugins
  - events: Plugin crafting the 'events' CPT with categories, tags, and convenient shortcodes for utilization. 

  - my_messenger: Plugin showcasing messages tailored for various WordPress roles on the login page.


    
## Installation

1. Download the Nebula theme ZIP file from [download link](https://github.com/Caberbar/nebula-wp/archive/refs/heads/main.zip) o clone this repository.
2. Add it to wp-content/themes/ folder and activate it in the admin area.
3. Install the two plugins in the wp-content/plugins/ folder and activate them in the admin-area.
4. The default installation is now ready, you can change settings as you want.



## Requirements

- WordPress 5.0 or higher
- PHP 7.2 or higher
- MySQL 5.6 or higher



## License

This theme is licensed under the [GNU General Public License v3.0](LICENSE).
