<?php

namespace Botble\Member\Tables\Traits;

trait ForMember
{
    public function booted(): void
    {
        $this
            ->setView('plugins/member::table.base')
            ->bulkChangeUrl(route('public.member.tables.bulk-change.save'))
            ->bulkChangeDataUrl(route('public.member.tables.bulk-change.data'))
            ->bulkActionDispatchUrl(route('public.member.tables.bulk-actions.dispatch'))
            ->filterInputUrl(route('public.member.tables.get-filter-input'));
    }
}
