<?php

use App\Models\BonusCard;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
     $trail->push('Main', route('admin.index'));
});
Breadcrumbs::for('admin.bonus_cards.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.bonus_cards.index'));
});
Breadcrumbs::for('admin.bonus_cards.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.bonus_cards.index');
    $trail->push($bonus_card->title, route('admin.bonus_cards.show', $bonus_card));
});
Breadcrumbs::for('admin.bonus_cards.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.bonus_cards.index');
    $trail->push('Create', route('admin.bonus_cards.create'));
});
Breadcrumbs::for('admin.bonus_cards.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.bonus_cards.index');
    $trail->push($bonus_card->title, route('admin.bonus_cards.edit', $bonus_card));
});

Breadcrumbs::for('admin.pages.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.pages.index'));
});
Breadcrumbs::for('admin.pages.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.pages.index');
    $trail->push($bonus_card->title, route('admin.pages.show', $bonus_card));
});
Breadcrumbs::for('admin.pages.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.pages.index');
    $trail->push('Create', route('admin.pages.create'));
});
Breadcrumbs::for('admin.pages.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.pages.index');
    $trail->push($bonus_card->title, route('admin.pages.edit', $bonus_card));
});

Breadcrumbs::for('admin.casinos.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.casinos.index'));
});
Breadcrumbs::for('admin.casinos.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.casinos.index');
    $trail->push($bonus_card->title, route('admin.casinos.show', $bonus_card));
});
Breadcrumbs::for('admin.casinos.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.casinos.index');
    $trail->push('Create', route('admin.casinos.create'));
});
Breadcrumbs::for('admin.casinos.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.casinos.index');
    $trail->push($bonus_card->title, route('admin.casinos.edit', $bonus_card));
});
Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.categories.index'));
});
Breadcrumbs::for('admin.categories.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.categories.index');
    $trail->push($bonus_card->title, route('admin.categories.show', $bonus_card));
});
Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories.index');
    $trail->push('Create', route('admin.categories.create'));
});
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.categories.index');
    $trail->push($bonus_card->title, route('admin.categories.edit', $bonus_card));
});
Breadcrumbs::for('admin.game_types.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.game_types.index'));
});
Breadcrumbs::for('admin.game_types.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.game_types.index');
    $trail->push($bonus_card->title, route('admin.game_types.show', $bonus_card));
});
Breadcrumbs::for('admin.game_types.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.game_types.index');
    $trail->push('Create', route('admin.game_types.create'));
});
Breadcrumbs::for('admin.game_types.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.game_types.index');
    $trail->push($bonus_card->title, route('admin.game_types.edit', $bonus_card));
});
Breadcrumbs::for('admin.bonus_types.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.bonus_types.index'));
});
Breadcrumbs::for('admin.bonus_types.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.bonus_types.index');
    $trail->push($bonus_card->title, route('admin.bonus_types.show', $bonus_card));
});
Breadcrumbs::for('admin.bonus_types.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.bonus_types.index');
    $trail->push('Create', route('admin.bonus_types.create'));
});
Breadcrumbs::for('admin.bonus_types.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.bonus_types.index');
    $trail->push($bonus_card->title, route('admin.bonus_types.edit', $bonus_card));
});
Breadcrumbs::for('admin.softs.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.softs.index'));
});
Breadcrumbs::for('admin.softs.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.softs.index');
    $trail->push($bonus_card->title, route('admin.softs.show', $bonus_card));
});
Breadcrumbs::for('admin.softs.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.softs.index');
    $trail->push('Create', route('admin.softs.create'));
});
Breadcrumbs::for('admin.softs.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.softs.index');
    $trail->push($bonus_card->title, route('admin.softs.edit', $bonus_card));
});
Breadcrumbs::for('admin.licenses.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.licenses.index'));
});
Breadcrumbs::for('admin.licenses.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.licenses.index');
    $trail->push($bonus_card->title, route('admin.licenses.show', $bonus_card));
});
Breadcrumbs::for('admin.licenses.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.licenses.index');
    $trail->push('Create', route('admin.licenses.create'));
});
Breadcrumbs::for('admin.licenses.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.licenses.index');
    $trail->push($bonus_card->title, route('admin.licenses.edit', $bonus_card));
});
Breadcrumbs::for('admin.certificates.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.certificates.index'));
});
Breadcrumbs::for('admin.certificates.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.certificates.index');
    $trail->push($bonus_card->title, route('admin.certificates.show', $bonus_card));
});
Breadcrumbs::for('admin.certificates.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.certificates.index');
    $trail->push('Create', route('admin.certificates.create'));
});
Breadcrumbs::for('admin.certificates.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.certificates.index');
    $trail->push($bonus_card->title, route('admin.certificates.edit', $bonus_card));
});
Breadcrumbs::for('admin.games.index', function (BreadcrumbTrail $trail) {
    $trail->push('Bonus cards', route('admin.games.index'));
});
Breadcrumbs::for('admin.games.show', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.games.index');
    $trail->push($bonus_card->title, route('admin.games.show', $bonus_card));
});
Breadcrumbs::for('admin.games.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.games.index');
    $trail->push('Create', route('admin.games.create'));
});
Breadcrumbs::for('admin.games.edit', function (BreadcrumbTrail $trail, BonusCard $bonus_card) {
    $trail->parent('admin.games.index');
    $trail->push($bonus_card->title, route('admin.games.edit', $bonus_card));
});
