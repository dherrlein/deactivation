<?php

namespace Dherrlein\Deactivation;

use Illuminate\Database\Schema\Blueprint;

class DeactivationServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const DEACTIVABLE_COLUMN_NAME = 'deactivated_at';

    public function boot()
    {
        $this->registerDeactivation();
    }

    private function registerDeactivation(): void
    {
        Blueprint::macro('deactivation', function ($column = self::DEACTIVABLE_COLUMN_NAME) {
            $this->timestamp($column)->nullable();
        });

        Blueprint::macro('dropDeactivation', function ($column = self::DEACTIVABLE_COLUMN_NAME) {
            $this->dropColumn([$column]);
        });
    }
}
