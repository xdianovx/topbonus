<?php

namespace App\Providers;

use App\Models\BonusCard;
use App\Models\BonusType;
use App\Models\Casino;
use App\Models\Category;
use App\Models\CertificatesOrgs;
use App\Models\Game;
use App\Models\GameType;
use App\Models\LicensesOrgs;
use App\Models\Page;
use App\Models\Soft;
use Illuminate\Support\Facades\View;
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
        View::share('licenses_routes', LicensesOrgs::$licenses_routes);
        View::share('certificates_routes', CertificatesOrgs::$certificates_routes);
        View::share('pages_routes', Page::$pages_routes);
        View::share('categories_routes', Category::$categories_routes);
        View::share('casinos_routes', Casino::$casinos_routes);
        View::share('bonus_cards_routes', BonusCard::$bonus_cards_routes);
        View::share('softs_routes', Soft::$softs_routes);
        View::share('game_types_routes', GameType::$game_types_routes);
        View::share('games_routes', Game::$games_routes);
        View::share('bonus_types_routes', BonusType::$bonus_types_routes);
    }
}
