<?php
namespace App\Reports;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Rishadblack\IReports\BaseReportController;
use Rishadblack\IReports\Filter;

class UserReport extends BaseReportController
{
    /**
     * Optionally override configure to set custom filename or other config
     */
    public function configure(): void
    {
        // For example, to override filename prefix (optional)
        // $this->setFileName('custom_users_report');
        // $this->setPaginationList([10, 25, 50]);
        $this->setOrientation('landscape');

    }

    /**
     * Build the query builder for the report data
     */
    public function builder(Request $request): Builder
    {
        return User::query();
    }

    /**
     * Define filters to apply to the query based on request input
     */
    public function filters(): array
    {
        return [
            Filter::make('status')->filter(function (Builder $builder, $value) {
                if (in_array($value, ['active', 'inactive'])) {
                    $builder->where('status', $value);
                }
            }),

            Filter::make('role')->filter(function (Builder $builder, $value) {
                $builder->where('role', $value);
            }),
        ];
    }

    // No need to override getViewName() — it will default to 'reports.user'
}
