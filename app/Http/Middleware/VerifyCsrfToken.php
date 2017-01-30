<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'admin/banks/*',
        'admin/jobs/*',
        'admin/units/*',
        'admin/discounts_income/*',
        'admin/holidays_days/*',
        'admin/petty_cash_concepts/*',
        'admin/families/*',
        'admin/categories/*',
        'admin/classification/*',
        'admin/families_keys/*',
        'admin/company_social_reason/*',
        'admin/logo/*',
        'admin/logoo/*',
        'admin/permission/*',
        'admin/users/*',
        'admin/municipalities/*',
        'admin/employees/*',
        'admin/services/*',
        'admin/developments/*',
        'admin/documents_types/*',
        'admin/profile/*',
        'admin/perm/*',
        'admin/permA/*',
        'admin/permU/*',
        'admin/permD/*',
        'admin/clients/*',
        'admin/families_office/*',
        'admin/projects/*',
        'admin/getReasons/*',
        'admin/getReasonsSingle/*'

    ];
}
