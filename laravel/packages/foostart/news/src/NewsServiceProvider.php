<?php

namespace Foostart\News;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

use URL, Route;
use Illuminate\Http\Request;


class NewsServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
         $this->publishes([
            __DIR__.'/config/news_admin.php' => config_path('news_admin.php'),
        ],'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'news');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'news');


        /**
         * Load view composer
         */
        $this->newsViewComposer($request);

         $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Foostart\News\Controllers\Admin\NewsAdminController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'news');
    }

    /**
     *
     */
    public function newsViewComposer(Request $request) {

        view()->composer('news::news*', function ($view) {
            global $request;
            $news_id = $request->get('id');
            $is_action = empty($news_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                /**
                 * News
                 */
                //list
                trans('news::news_admin.page_list') => [
                    'url' => URL::route('admin_news'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                //add
                trans('news::news_admin.'.$is_action) => [
                    'url' => URL::route('admin_news.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],

                /**
                 * Categories
                 */
                //list
                trans('news::news_admin.page_category_list') => [
                    'url' => URL::route('admin_news_category'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
            ]);
            //
        });
    }

}
