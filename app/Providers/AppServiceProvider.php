<?php

namespace App\Providers;

use App\Models\Content;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (Schema::hasTable('contents')) {
                $contents = Content::all();
                foreach ($contents as $content) {
                    if ($content->value !== null) {
                        $current = config('glowtide.'.$content->key);
                        if (is_array($current) && is_array($content->value) && array_is_list($current) === false) {
                            config(['glowtide.'.$content->key => array_merge($current, $content->value)]);
                        } else {
                            config(['glowtide.'.$content->key => $content->value]);
                        }
                    }
                }
            }
        } catch (\Throwable $e) {
            // Silently continue if database is not ready
        }
    }
}
