<?php

namespace Botble\Block\Providers;

use Botble\Base\Supports\ServiceProvider;
use Botble\Block\Models\Block;
use Botble\Shortcode\Compilers\Shortcode;

class HookServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (! function_exists('shortcode')) {
            return;
        }

        add_shortcode(
            'static-block',
            trans('plugins/block::block.static_block_short_code_name'),
            trans('plugins/block::block.static_block_short_code_description'),
            [$this, 'render']
        );

        shortcode()->setAdminConfig('static-block', [$this, 'staticBlockAdminConfig']);
    }

    public function render(Shortcode $shortcode): string|null
    {
        $key = $shortcode->alias;

        if (! $key) {
            return null;
        }

        return Block::query()
            ->wherePublished()
            ->where('alias', $key)
            ->value('content');
    }

    public function staticBlockAdminConfig(array $attributes, string|null $content): string
    {
        $blocks = Block::query()
            ->wherePublished()
            ->pluck('name', 'alias')
            ->all();

        return view('plugins/block::partials.short-code-admin-config', compact('blocks', 'attributes', 'content'))
            ->render();
    }
}
