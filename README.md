## Import YouTube Playlist

An example Laravel project to import YouTube playlist videos to database. 

Prepared for a class in [Professional Laravel](https://cutt.ly/wedevs-laravel) course.

### Installation

1. Clone the repository

    ```bash
    git clone https://github.com/phpfour/youtube-playlist
    ```

2. Install composer dependencies and chromedriver

    ```bash
    composer install
    vendor/bin/bdi detect drivers
    ```

3. Generate application key

    ```bash
    php artisan key:generate
    ```

4. Migrate the database

    ```bash
    php artisan migrate --seed
    ```

5. Run the console command with event name and playlist URL to import videos: 

    ```bash
    php artisan import:event-from-youtube "Laracon EU 2022" "https://www.youtube.com/playlist?list=PLMdXHJK-lGoBcH4il_bq-aD_p34ZrBlas"
    ```

6. The database will be populated with the videos from the playlist.
